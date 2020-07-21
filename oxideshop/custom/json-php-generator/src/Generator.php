<?php

namespace OxidProfessionalServices;

use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use PHP_CodeSniffer\Exceptions\DeepExitException;

class Generator
{
    /**
     * @var array
     */
    protected $definitions;

    /**
     * @var
     */
    protected $fileContent;

    /**
     * @var array
     */
    protected $references = [];

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $subNameSpace
     */
    public function __construct($jsonFile, $namespace, $subNameSpace)
    {
        $this->generateModels($jsonFile, $namespace, $subNameSpace);
    }

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $subNameSpace
     */
    private function generateModels($jsonFile, $namespace, $subNameSpace): void
    {
        $this->readDefinition($jsonFile);

        $this->buildRefs();


        foreach ($this->definitions as $defName => $defs) {

            $ns = new PhpNamespace($namespace . '\\' . $subNameSpace);

            $className = $this->calculateClassName($defName, $defs);



            $class = $ns->addClass($className);
            if(!empty($defs['description'])) {
                $class->addComment($defs['description']);
            }

            $properties = [];
            if (isset($defs['allOf'])) {
                $firstRef = true;
                foreach ($defs['allOf'] as $partialDef) {
                    if (isset($partialDef['$ref'])) {
                        $ref = $this->getRefNameFromRefString($partialDef['$ref']);
                        if ($firstRef) {
                            $class->addExtend($this->references[$ref]);
                            $firstRef = false;
                            continue;
                        }
                        $partialDef = $this->definitions[$ref];
                    }

                    $properties = array_merge($properties, $partialDef['properties']);
                }
                $defs['properties'] = $properties;
            }

            if(isset($defs['properties'])) {
                foreach ($defs['properties'] as $name => $parameter) {
                    if (isset($parameter['type'])) {

                        if($parameter['type'] === 'string') {
                            $class->addProperty($name)
                                ->setVisibility('public')
                                ->setComment('@var string');
                        }

                        if ($parameter['type'] === 'object') {
                            if (isset($parameter['properties'])) {
                                $cna = explode('_', $name);
                                $cna = array_map('ucwords', $cna);
                                $newClassName = implode('', $cna);
                                $parameter['type'] = $namespace . '\\' . $subNameSpace . '\\' . $newClassName;
                                $name = $newClassName;

                                foreach($parameter['properties'] as $propertyName => $propertyValue) {
                                    if (isset($propertyValue['type'])) {
                                        if ($propertyValue['type'] === 'string') {
                                            $class->addProperty($propertyName)
                                                ->setVisibility('public')
                                                ->setComment('@var ' . $propertyValue['type']);
                                        }
                                    }
                                }
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
                            $ref = $this->getRefNameFromRefString($parameter['$ref']);
                            if (isset($this->references[$ref])) {
                                $class->addProperty($name)
                                    ->setVisibility('public')
                                    ->setComment('@var ' . $this->references[$ref]);
                            }
                        }
                    }
                }
            }
            $class->addImplement(\JsonSerializable::class);
            $class->addMethod('jsonSerialize')->addBody('return array_filter((array) $this);')->setVisibility('public');

//              $title = implode('', explode(' ', $definition['title']));
//              $title = preg_replace("/[^A-Za-z0-9 ]/", '', $title);

            $this->writeClassFile($subNameSpace, $className, $ns);
        }
    }

    /**
     * @param string $subNameSpace
     * @param string $className
     * @param PhpNamespace $ns
     */
    private function writeClassFile($subNameSpace, $className, PhpNamespace $ns): void
    {
        $directory = str_replace('OxidProfessionalServices\PayPal\Api\Model\\', '', '../paypal-client/src/Model/' . $subNameSpace);

        if (!is_dir($directory)) {
            mkdir($directory, 0744, true);
        }

        $className = str_replace('\\', '/', $directory . '/' . $className . '.php');

        if (!file_exists($className)) {
            if(!file_put_contents($className, '<?php' . PHP_EOL . PHP_EOL . $ns)) {
                echo "error writing file " . $className . PHP_EOL;
            }
        }
    }

    /**
     * @param $namespace
     * @param $classname
     * @param $name
     * @param $refName
     * @param $class
     * @return mixed
     */
    private function generateFromRef($namespace, $classname, $name, $refName, $class)
    {
        $fileName = $this->getFileNameFromRefName($refName);

        $parameter['type'] = $namespace . '\\' . $classname . '\\' . $fileName;

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

    /**
     * @param $defName
     * @param $defs array<string>
     * @return string|string[]|null
     */
    protected function calculateClassName($defName, $defs)
    {

        $refName = $this->getRefNameFromRefString($defName);
        $defClassName = $this->replaceNumbers($this->getClassNameFromRefName($refName));

        if (strpos($defName, 'MerchantsCommonComponentsSpecification') === false) {
            if(isset($defs['title'])) {
                $title = implode('', explode(' ', $defs['title']));
                $title = preg_replace("/[^A-Za-z0-9 ]/", '', $title);
            }
        }

        return $defClassName;
    }


    protected $uniqueType = [];

    /**
     * @return void
     */
    protected function buildRefs(): void
    {
        foreach ($this->definitions as $defName => $defs) {

            if (!isset($defs['type'])) {
                $defs['type'] = "string";
                if (isset($defs['allOf'])) {
                    $defs['type'] = "object";
                }
            }
            if (empty($defs['properties']) && !isset($defs['allOf'])) {
                $this->references[$defName] = $defs['type'];
            }
            if (isset($defs['type'])) {
                $type = $defs['type'];

                if ($type == 'object') {
                    $className = $this->calculateClassName($defName, $defs);
                    $this->references[$defName] = $className;
                } else {
                    $this->references[$defName] = $type;
                }
            }
        }
    }

    /**
     * @param $jsonFile
     */
    protected function readDefinition($jsonFile): void
    {
        $this->fileContent = json_decode(file_get_contents($jsonFile), true);

        $this->definitions = $this->fileContent['definitions'];
    }
}
