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

        shell_exec('rm -rf ../paypal-client/src/Model/' . $subNameSpace);


        foreach ($this->definitions as $defName => $defs) {
            $this->generateModelClass($namespace, $subNameSpace, $defName, $defs);
        }
    }

    /**
     * @param string $subNameSpace
     * @param string $className
     * @param PhpNamespace $ns
     */
    private function writeClassFile($subNameSpace, $className, PhpNamespace $ns): void
    {
        $directory = str_replace(
            'OxidProfessionalServices\PayPal\Api\Model\\',
            '',
            '../paypal-client/src/Model/' . $subNameSpace
        );

        if (!is_dir($directory)) {
            mkdir($directory, 0744, true);
        }

        $className = str_replace('\\', '/', $directory . '/' . $className . '.php');
        $printer = new PsrPrinter();
        $phpContent = $printer->printNamespace($ns);
        if (!file_exists($className)) {
            if (!file_put_contents($className, '<?php' . PHP_EOL . PHP_EOL . $phpContent)) {
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
        return preg_replace_callback('/[0-9]/', function ($matches) use ($numbers) {
            return $numbers[ $matches[0] ];
        }, $string);
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
        $className = $this->replaceNumbers($this->getClassNameFromRefName($refName));
        if ($className == "LinkDescription" || $className == "LinkSchema") {
            $this->definitions[$defName]['type'] = 'array';
            return "array";
        }


        /*
        if (strpos($defName, 'MerchantsCommonComponentsSpecification') === false) {
            if(isset($defs['title'])) {
                $title = implode('', explode(' ', $defs['title']));
                $title = preg_replace("/[^A-Za-z0-9 ]/", '', $title);
                if ($title != $defClassName) {
                    //not sure which name is better e.g. Title = ProductDetails vs Product
                }
            }
        }
*/
        return $className;
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
                if (!empty($defs['properties'])) {
                    //fix shema definition with missing object type e.g.
                    //customer_common_overrides-person.json in Partner API
                    $defs['type'] = "object";
                    $this->definitions[$defName]['type'] = "object";
                }
                if (isset($defs['allOf'])) {
                    $defs['type'] = "object";
                }
            }
            if (empty($defs['properties']) && !isset($defs['allOf'])) {
                if (isset($defs['oneOf'])) {
                    $defs['type'] = "string";
                }
                $this->references[$defName] = $defs['type'];
            }
            if (isset($defs['type'])) {
                $type = $defs['type'];

                if ($type == 'object') {
                    $className = $this->calculateClassName($defName, $defs);
                    if (isset($this->references[$defName])) {
                        throw new \Exception("duplicate Class Name");
                    }
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

    /**
     * @param string $namespace
     * @param string $subNameSpace
     * @param $defName
     * @param $defs
     */
    private function generateModelClass(string $namespace, string $subNameSpace, $defName, $defs): void
    {
        $ns = new PhpNamespace($namespace . '\\' . $subNameSpace);

        $className = $this->calculateClassName($defName, $defs);
        if ($className == "array") {
            return;
        }

        $class = $ns->addClass($className);
        if (!empty($defs['description'])) {
            $comment = $defs['description'];
            //this.value = sample_txt.replace(/(.{1,69})(?:\n|$| )/g, "$1\n");
            $comment = preg_replace("/(.{1,110})(?:\n|$| )/", "$1\n", $comment);
            $class->addComment($comment);
        }

        $properties = [];
        if (isset($defs['allOf'])) {
            $firstRef = true;
            foreach ($defs['allOf'] as $partialDef) {
                if (isset($partialDef['$ref'])) {
                    $ref = $this->getRefNameFromRefString($partialDef['$ref']);
                    if ($firstRef) {
                        $parent = $this->references[$ref];
                        if ($parent == "string") {
                            continue;
                        }
                        $parent = "$namespace\\$subNameSpace\\$parent";
                        $ns->addUse($parent);
                        $class->addExtend($parent);
                        $firstRef = false;
                        continue;
                    }
                    $partialDef = $this->definitions[$ref];
                }

                $properties = array_merge($properties, $partialDef['properties']);
            }
            $defs['properties'] = $properties;
        }

        if (isset($defs['properties'])) {
            foreach ($defs['properties'] as $name => $parameter) {
                if (isset($parameter['type'])) {
                    if ($parameter['type'] === 'object') {
                        $nestedClassId = $className . '_' . $name;
                        $nestedClassName = $this->calculateClassName($nestedClassId, $parameter);
              //          $parameter['type'] = "$namespace\\$subNameSpace\\$nestedClassName";
                        $parameter['type'] = "$nestedClassName";
                        $this->generateModelClass($namespace, $subNameSpace, $nestedClassId, $parameter);
                    }
                    if ($parameter['type'] === 'array') {
                        if (isset($parameter['items']['$ref'])) {
                            $ref = $this->getRefNameFromRefString($parameter['items']['$ref']);
                            if (isset($this->references[$ref])) {
                                $itemType = $this->references[$ref];
                                $parameter['type'] = "array<$itemType>";
                            }
                        }
                    }
                    if (is_array($parameter['type'])) {
                        $parameter['type'] = implode('|', $parameter['type']);
                    }

                    $class->addProperty($name)->setVisibility('public')->setComment('@var ' . $parameter['type']);
                } else {
                    // use the $this->references[] map here when you come across a reference
                    if (!empty($parameter['$ref'])) {
                        $ref = $this->getRefNameFromRefString($parameter['$ref']);
                        if (isset($this->references[$ref])) {
                            $class->addProperty($name)->setVisibility('public')->setComment('@var ' . $this->references[$ref]);
                        }
                    }
                }
            }
        }

        $ns->addUse(\JsonSerializable::class);
        $class->addImplement(\JsonSerializable::class);
        $ns->addUse($namespace . '\\BaseModel');
        $class->addTrait($namespace . '\\BaseModel');

        $this->writeClassFile($subNameSpace, $className, $ns);
    }
}
