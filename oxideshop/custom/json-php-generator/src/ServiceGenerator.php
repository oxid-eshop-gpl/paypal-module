<?php

namespace OxidProfessionalServices;

use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

class ServiceGenerator
{

    private $namespace;

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $className
     */
    public function __construct($jsonFile, $namespace, $modelNamespace, $className)
    {
        $this->namespace = $namespace;
        $this->generateClass($jsonFile, $namespace, $modelNamespace, $className);
    }


    /**
     * @param $defName
     * @return string|string[]
     */
    private function getRefNameFromRefString($defName)
    {
        return str_replace('#/definitions/', '', $defName);
    }

    private function replaceNumbers($string)
    {
        $numbers = array(
            '0' => 'Zero',
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine',
        );
        return preg_replace_callback('/[0-9]/', function ($matches) use ($numbers) {
            return $numbers[ $matches[0] ];
        }, $string);
    }

    /**
     * @param $refName
     * @return string
     */
    private function getClassNameFromRefName($refName)
    {
        $classNameExploded = explode('-', $refName);
        $defClassName = ucfirst(str_replace('.json', '', end($classNameExploded)));
        $defClassNameArray = array_map('ucwords', explode('_', $defClassName));
        $defClassName = implode('', $defClassNameArray);

        return $defClassName;
    }



    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $className
     */
    private function generateClass($jsonFile, $namespace, $modelNamespace, $className): void
    {
        $fileContent = json_decode(file_get_contents($jsonFile), true);

        $ns = new PhpNamespace($namespace);
        $serviceClass = $ns->addClass($className);
        $ns->addUse('OxidProfessionalServices\PayPal\Api\Client');
        $serviceClass->addProperty('client')->addComment('@var Client');
        $method = $serviceClass->addMethod('__construct')->setVisibility('public');
        $method->addParameter('client')->setType('OxidProfessionalServices\PayPal\Api\Client');
        $method->addComment('@param $client Client');
        $method->setBody('$this->client = $client;');


        $refMap = [];
        foreach ($fileContent['definitions'] as $defName => $def) {
            if (isset($def['type'])) {
                $type = $def['type'];
                if ($type == 'object') {
                    $refName = $this->getRefNameFromRefString($defName);
                    $defClassName = $this->replaceNumbers($this->getClassNameFromRefName($refName));
                    $defClassNameClean = $this->cleanName($defClassName);

                    $refMap[$defName] = '\\' . $modelNamespace . '\\' . $className . '\\' . $defClassName;
                } else {
                    $refMap[$defName] = $type;
                }
            } else {
                $refMap[$defName] = "string";
            }
        }

        foreach ($fileContent['paths'] as $path => $ops) {
            $path = str_replace('{', '{$', $path);
            foreach ($ops as $httpMethod => $def) {
                $methodName = $def['summary'];
                $methodName = $this->cleanMethodName($methodName);
                $method = $serviceClass->addMethod($methodName);
                $methodBody = '';
                $requestBody = "\$body = null;";
                $definedParameters = $def['parameters'];
                uasort($definedParameters, function ($e) {
                    return (int)isset($e['default']) . $e['name'];
                });

                foreach ($definedParameters as $parameterDefinition) {
                    $origParamName = $parameterDefinition['name'];
                    if ($origParamName == "Authorization" || "PayPal-Request-Id" == $origParamName) {
                        continue;
                    }
                    if ($origParamName == "Content-Type") {
                        $methodBody .= "\$headers['Content-Type'] = 'application/json';\n";
                        continue;
                    }
                    $paramName = $this->cleanMethodName($origParamName);
                    $path = str_replace($origParamName, $paramName, $path);
                    $methodParam = $method->addParameter($paramName);
                    if (isset($parameterDefinition['default'])) {
                        $methodParam->setDefaultValue($parameterDefinition['default']);
                    }


                    if ($parameterDefinition['in'] == "body") {
                        $requestBody = "\$body = json_encode(array_filter((array)\$$paramName), true);";
                    } elseif ($parameterDefinition['in'] == "header") {
                        $methodBody .= "\$headers['$origParamName'] = \$$paramName;\n";
                    }

                    if (isset($parameterDefinition['schema'])) {
                        $defName = $parameterDefinition['schema']['$ref'];
                        $defName = str_replace('#/definitions/', '', $defName);
                        $type = $refMap[$defName];
                        $methodParam->setType($type);
                        if (strpos($type, '\\') !== false) {
                            $ns->addUse($type);
                        }
                    }
                }

                $res = null;
                foreach ($def['responses'] as $code => $response) {
                    if ($code >= 200 && $code <= 300) {
                        $res = $response;
                        break;
                    }
                }
                if ($res) {
                    if (isset($res['schema'])) {
                        $defName = $res['schema']['$ref'];
                        $defName = str_replace('#/definitions/', '', $defName);
                        $responseType = $refMap[$defName];
                        $ns->addUse($responseType);
                        $method->setReturnType($responseType);
                        $responseType = (substr($responseType, strrpos($responseType, '\\') + 1));
                    }
                }
                $basePath = $fileContent['basePath'];
                $fullPath = $basePath . $path;
                $httpMethod = strtoupper($httpMethod);
                $methodBody = <<<PHP
\$headers = [];
$methodBody
$requestBody
\$request = \$this->client->createRequest('$httpMethod', "$fullPath", \$headers, \$body);
\$response = \$this->client->send(\$request);
\$jsonProduct = json_decode(\$response->getBody());
\$mapper = new \JsonMapper();
return \$mapper->map(\$jsonProduct, new $responseType());
PHP;
                    $method->setBody($methodBody);
                    $method->setVisibility('public');
            }
        }
        $this->writeClassFile($className, $ns);
    }


    /**
     * @param string $className
     * @param PhpNamespace $ns
     */
    private function writeClassFile($className, PhpNamespace $ns): void
    {
        $directory = '../paypal-client/src/Service/';

        if (!is_dir($directory)) {
            mkdir($directory, 0744, true);
        }

        $fileName = str_replace('\\', '/', $directory . '/' . $className . '.php');

        $printer = new PsrPrinter();
        $ns = $printer->printNamespace($ns);
        if (!file_put_contents($fileName, '<?php' . PHP_EOL . PHP_EOL . $ns)) {
            echo "error writing file " . $fileName . PHP_EOL;
        }
    }

    /**
     * @param $methodName
     */
    private function cleanName($methodName): string
    {
        $methodName = ucwords($methodName, $delimiters = " \t\r\n\f\v-_");
        $methodName = implode('', explode(' ', $methodName));
        return preg_replace("/[^A-Za-z0-9 ]/", '', $methodName);
    }

    /**
     * @param $methodName
     */
    private function cleanMethodName($methodName): string
    {
        return lcfirst($this->cleanName($methodName));
    }
}
