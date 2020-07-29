<?php

namespace OxidProfessionalServices;

use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use OxidProfessionalServices\PayPal\Api\Service\BaseService;

class ServiceGenerator extends Generator
{

    private $namespace;

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $subNameSpace
     */
    public function __construct($jsonFile, $namespace, $modelNamespace, $subNameSpace)
    {
        $this->namespace = $namespace;
        parent::__construct($jsonFile, $modelNamespace, $subNameSpace);
        $this->generateService($namespace, $modelNamespace, $subNameSpace);
    }

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $className
     */
    private function generateService($namespace, $modelNamespace, $className): void
    {

        $ns = new PhpNamespace($namespace);
        $ns->addUse(\JsonMapper::class);
        $serviceClass = $ns->addClass($className);
        $ns->addUse(BaseService::class);
        $serviceClass->addExtend(BaseService::class);
        $ns->addUse('OxidProfessionalServices\PayPal\Api\Client');
        $basePath = $this->fileContent['basePath'];
        $serviceClass->addProperty('basePath')->setValue($basePath)->setVisibility('protected');
        $refMap = [];
        foreach ($this->references as $defName => $type) {
            $def = $this->definitions[$defName];

            if (isset($def['type']) && $def['type'] == 'object') {
                $type = '\\' . $modelNamespace . '\\' . $className . '\\' . $type;
            }
            $refMap[$defName] = $type;
        }

        foreach ($this->fileContent['paths'] as $path => $ops) {
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
                        //do not set the http header here because
                        //some schemas like the dispute API do use "consumes" definition
                        //and by that there will be no explicit Content-Type paramter and
                        //the type is added for simplicity below if there is a "body" parameter
                        continue;
                    }
                    $paramName = $this->cleanMethodName($origParamName);
                    $path = str_replace($origParamName, $paramName, $path);
                    $methodParam = $method->addParameter($paramName);
                    if (isset($parameterDefinition['default'])) {
                        $methodParam->setDefaultValue($parameterDefinition['default']);
                    }


                    if ($parameterDefinition['in'] == "body") {
                        $methodBody .= "\$headers['Content-Type'] = 'application/json';\n";
                        $requestBody = "\$body = json_encode(\$$paramName, true);";
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
                $errorResponseSchema = null;
                foreach ($def['responses'] as $code => $response) {
                    if ($code >= 200 && $code <= 300) {
                        $res = $response;
                    }
                }
                $responseType = "void";
                if ($res) {
                    if (isset($res['schema'])) {
                        $defName = $res['schema']['$ref'];
                        $defName = str_replace('#/definitions/', '', $defName);
                        $responseType = $refMap[$defName];
                        $ns->addUse($responseType);
                        $method->setReturnType($responseType);
                        $responseType = (substr($responseType, strrpos($responseType, '\\') + 1));
                    } else {
                        $method->setReturnType($responseType);
                    }
                }

                $httpMethod = strtoupper($httpMethod);
                $methodBody = <<<PHP
\$headers = [];
$methodBody
$requestBody
\$response = \$this->send('$httpMethod', "$path", \$headers, \$body);

PHP;
                if ($responseType != "void") {
                    $methodBody .= <<<PHP
\$mapper = new JsonMapper();
\$jsonProduct = json_decode(\$response->getBody());
return \$mapper->map(\$jsonProduct, new ${responseType}());
PHP;
                }

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
        $directory = '../paypal-client/generated/Service/';

        if (!is_dir($directory)) {
            mkdir($directory, 0744, true);
        }

        $fileName = str_replace('\\', '/', $directory . '/' . $className . '.php');

        $printer = new PsrPrinter();
        $phpContent = $printer->printNamespace($ns);
        if (!file_put_contents($fileName, '<?php' . PHP_EOL . PHP_EOL . $phpContent)) {
            echo "error writing file " . $fileName . PHP_EOL;
        }
    }


    /**
     * @param $methodName
     * @return string
     */
    private function cleanMethodName($methodName): string
    {
        return lcfirst($this->cleanName($methodName));
    }
}
