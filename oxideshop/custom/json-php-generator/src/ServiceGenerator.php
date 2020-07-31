<?php

namespace OxidProfessionalServices;

use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Service\BaseService;

class ServiceGenerator extends Generator
{

    private $namespace;

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $subNameSpace
     */
    public function generateServiceAndModels($jsonFile, $namespace, $modelNamespace, $subNameSpace)
    {
        $this->namespace = $namespace;

        $this->generateModels($jsonFile, $modelNamespace, $subNameSpace);
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
        $serviceClass = $ns->addClass($className);
        $ns->addUse(BaseService::class);
        $serviceClass->addExtend(BaseService::class);
        $basePath = $this->fileContent['basePath'];
        $serviceClass->addProperty('basePath')->setValue($basePath)->setVisibility('protected');
        $refMap = [];
        foreach ($this->references as $defName => $type) {
            $def = $this->definitions[$defName];

            if (isset($def['type']) && $def['type'] == 'object') {
                $type = '\\' . $modelNamespace . '\\' . $type;
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
                $methodBodyQueryParameter = '';
                $methodBodyHeaders = '';
                $requestBody = "\$body = null;";
                $definedParameters = $def['parameters'];
                uasort($definedParameters, function ($e) {
                    return (int)isset($e['default']) . $e['name'];
                });
                $method->addComment($this->formatComment($def['description']));
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
                        $methodBodyHeaders .= "\$headers['Content-Type'] = 'application/json';\n";
                        $requestBody = "\$body = json_encode(\$$paramName, true);";
                    } elseif ($parameterDefinition['in'] == "header") {
                        $methodBodyHeaders .= "\$headers['$origParamName'] = \$$paramName;\n";
                    } elseif ($parameterDefinition['in'] == "query") {
                        $methodBodyQueryParameter .= "\$params['$origParamName'] = \$$paramName;\n";
                    }
                    $paramType = $parameterDefinition['type'] ?? 'mixed';
                    $paramDesc = $parameterDefinition['description'] ?? '';
                    $method->addComment($this->formatComment("@param \$$paramName $paramType $paramDesc"));
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
                $ns->addUse(ApiException::class);
                $method->addComment("@throws ApiException");

                $responseType = "void";
                if ($res) {
                    if (isset($res['schema'])) {
                        $defName = $res['schema']['$ref'];
                        $defName = str_replace('#/definitions/', '', $defName);
                        $defName = basename($defName);
                        if (isset($refMap[$defName])) {
                            $responseType = $refMap[$defName];
                        } else {
                            $responseType = \stdClass::class;
                        }
                        $ns->addUse($responseType);
                        $method->setReturnType($responseType);
                        $responseType = (substr($responseType, strrpos($responseType, '\\') + 1));
                    } else {
                        $method->setReturnType($responseType);
                    }
                    $method->addComment("@return $responseType");
                }

                $httpMethod = strtoupper($httpMethod);
                $headersParam = '[]';
                if ($methodBodyHeaders != '') {
                    $headersParam = '$headers';
                    $methodBodyHeaders = "\$headers = [];\n$methodBodyHeaders";
                }
                $paramsParam = '[]';
                if ($methodBodyQueryParameter != '') {
                    $paramsParam = '$params';
                    $methodBodyQueryParameter = <<<PHP
\$params = [];
$methodBodyQueryParameter
PHP;
                }
                $methodBody = <<<PHP
\$path = "$path";
$methodBody
$methodBodyHeaders
$methodBodyQueryParameter
$requestBody
\$response = \$this->send('$httpMethod', \$path, $paramsParam, $headersParam, \$body);

PHP;
                if ($responseType != "void") {
                    $methodBody .= <<<PHP
\$jsonData = json_decode(\$response->getBody(), true);
return new ${responseType}(\$jsonData);
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
