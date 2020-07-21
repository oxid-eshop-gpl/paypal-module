<?php

namespace OxidProfessionalServices;

use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

class Generator
{
    /**
     * @var array
     */
    private $definitions;

    /**
     * @var array
     */
    private $references = [];

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $className
     */
    public function __construct($jsonFile, $namespace, $className)
    {
        $this->generateModels($jsonFile, $namespace, $className);
    }

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $className
     */
    private function generateModels($jsonFile, $namespace, $className): void
    {
        $fileContent = json_decode(file_get_contents($jsonFile), true);

        $this->definitions = $fileContent['definitions'];

        foreach($this->definitions as $defName => $definition) {

            if(empty($definition['properties'])) {
                continue;
            }

            $ns = new PhpNamespace($namespace . '\\' . $className);

            if(strpos($defName, 'MerchantsCommonComponentsSpecification') !== false) {
                $refName = $this->getRefNameFromRefString($defName);
                $defClassName = $this->replaceNumbers($this->getClassNameFromRefName($refName));
                $class = $ns->addClass($defClassName);

                if(!empty($definition['description'])) {
                    $class->addComment($definition['description']);
                }

                foreach ($definition['properties'] as $name => $parameter) {
                    if (isset($parameter['$ref'])) {
                        $ref = $this->getRefNameFromRefString($parameter['$ref']);
                        $class = $this->generateFromRef($namespace, $name, $ref, $class);
                    } elseif (isset($parameter['type'])) {
                        if(!empty($parameter['type'])) {
                            $comment = $this->parseCommentString($parameter);
                            $class->addProperty($name)
                                ->setVisibility('public')
                                ->setComment('@var ' . $comment);
                        }
                    }
                }

                $this->references[$defName] = $defClassName;

                $this->writeClassFile($className, $defClassName, $ns);
            }
        }

        foreach($this->definitions as $defName => $definition) {
            $ns = new PhpNamespace($namespace . '\\' . $className);

            if(strpos($defName, 'MerchantsCommonComponentsSpecification') === false) {

                foreach ($fileContent['definitions'] as $key => $defs) {

                    if(isset($defs['title'])) {
                        $title = implode('', explode(' ', $defs['title']));
                        $title = preg_replace("/[^A-Za-z0-9 ]/", '', $title);
                    }

                    if(empty($title)) {
                        $title = $this->replaceNumbers($this->getClassNameFromRefName($key));
                    }

                    $class = $ns->addClass($title);

                    if(isset($defs['properties'])) {
                        foreach ($defs['properties'] as $name => $parameter) {
                            if (isset($parameter['type'])) {
                                if ($parameter['type'] === 'object') {
                                    if (isset($parameter['properties'])) {
                                        $cna = explode('_', $name);
                                        $cna = array_map('ucwords', $cna);
                                        $newClassName = implode('', $cna);
                                        $fileName = $newClassName;
                                        $parameter['type'] = $namespace . '\\' . $className . '\\' . $newClassName;
                                        $name = $newClassName;
                                        $this->generateObject($parameter['properties'], $namespace . '\\' . $className, $fileName, $newClassName);
                                    }
                                }

                                if (is_array($parameter['type'])) {
                                    $parameter['type'] = implode('|', $parameter['type']);
                                }

                                $class->addProperty($name)
                                    ->setVisibility('public')
                                    ->setComment('@var ' . $parameter['type']);
                            } else {
                                // use the $this->references[] map here when you come across a reference
                                if (!empty($parameter['$ref'])) {
//                                $refName = str_replace('#/definitions/', '', $parameter['$ref']);
                                    $ref = $this->getRefNameFromRefString($parameter['$ref']);
                                    if (isset($this->references[$ref])) {
                                        $class->addProperty($name)
                                            ->setVisibility('public')
                                            ->setComment('@var ' . $this->references[$ref]);
                                    }
                                }
                            }
                        }
                    } else {
                        $l=1;
                    }
                }
            }

            $this->writeClassFile($className, $defClassName, $ns);
        }
    }

    /**
     * @param array $jsonData
     * @param string $namespace
     * @param string $fileName
     * @param string $className
     */
    private function generateObject($jsonData, $namespace, $fileName, $className)
    {
        $ns = new PhpNamespace($namespace);
        $class = $ns->addClass($className);

        foreach($jsonData as $key => $value) {
            if(isset($value['type'])) {
                if($value['type'] === 'string') {
                    $class->addProperty($key)
                        ->setVisibility('public')
                        ->setComment('@var ' . $value['type']);
                } else {
                    $x = 1;
                }
            }



//            if ($value['type'] === 'object') {
//                foreach($jsonData['properties'] as $propertyName => $propertyValue) {
//                    if(!empty($propertyValue['$ref'])) {
//                        $refName = str_replace('#/definitions/', '', $propertyValue['$ref']);
//                        $class = $this->generateFromRef($namespace, $refName, $class);
//                    }
//                }
//            }






            if(empty($value['type'])) {


//                if(!empty($value['$ref'])) {
//                    $refName = str_replace('#/definitions/', '', $value['$ref']);
//                    $class = $this->generateFromRef($namespace, $refName, $class);
//                }
//                elseif ($value === 'object') {
//                    foreach($jsonData['properties'] as $propertyName => $propertyValue) {
//                        if(!empty($propertyValue['$ref'])) {
//                            $refName = str_replace('#/definitions/', '', $propertyValue['$ref']);
//                            $class = $this->generateFromRef($namespace, $refName, $class);
//                        }
//                    }
//                }
//
////                if(!isset($value['type'])) {
////                    $class->addProperty($key)
////                        ->setVisibility('public')
////                        ->setComment('@var ' . $jsonData['type']);
////                }
//            }
//
//            if(isset($value['type'])) {
//                $class->addProperty($key)
//                    ->setVisibility('public')
//                    ->setComment('@var ' . $value['type']);
            }
        }

        $this->writeClassFile($namespace, $fileName, $ns);
    }

    /**
     * @param string $className
     * @param string $fileName
     * @param PhpNamespace $ns
     */
    private function writeClassFile($className, $fileName, PhpNamespace $ns): void
    {
        $directory = str_replace('OxidProfessionalServices\PayPal\Api\Model\\', '', '../paypal-client/src/Model/' . $className);

        if (!is_dir($directory)) {
            mkdir($directory, 0744, true);
        }

        $fileName = str_replace('\\', '/', $directory . '/' . $fileName . '.php');

        if (!file_exists($fileName)) {
            if(!file_put_contents($fileName, '<?php' . PHP_EOL . PHP_EOL . $ns)) {
                echo "error writing file " . $fileName . PHP_EOL;
            }
        }
    }

    /**
     * @param $namespace
     * @param $name
     * @param $refName
     * @param $class
     * @return mixed
     */
    private function generateFromRef($namespace, $name, $refName, $class)
    {
        $fileName = $this->getFileNameFromRefName($refName);

        $parameter['type'] = $namespace . '\\' . $fileName;

        $class->addProperty(lcfirst($name))
            ->setVisibility('public')
            ->setComment('@var ' . $parameter['type']);

        return $class;

    }

    /**
     * @param $defName
     * @return string|string[]
     */
    private function getRefNameFromRefString($defName)
    {
        return str_replace('#/definitions/', '', $defName);
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
     * @param $refName
     * @return string
     */
    private function getFileNameFromRefName($refName)
    {
        $classNameExploded = explode('-', $refName);
        return implode(
            '',
            array_map(
                'ucwords',
                explode(
                    '_',
                    ucfirst(
                        str_replace(
                            '.json',
                            '',
                            end(
                                $classNameExploded
                            )
                        )
                    )
                )
            )
        );
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
        return preg_replace_callback( '/[0-9]/', function ( $matches ) use ( $numbers ) {
            return $numbers[ $matches[0] ];
        }, $string );
    }

    /**
     * @param $parameter
     * @return string
     */
    private function parseCommentString($parameter): string
    {
        if (is_string($parameter['type'])) {
            $comment = $parameter['type'];
        } else {
            $comment = implode('|', $parameter['type']);
        }
        return $comment;
    }
}
