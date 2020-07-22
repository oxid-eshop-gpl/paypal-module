<?php

namespace OxidProfessionalServices;

use Exception;
use JsonSerializable;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

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
                        throw new Exception("duplicate Class Name");
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
     * @param $namespace
     * @param $subNameSpace
     * @param $defName
     * @param $defs
     */
    private function generateModelClass($namespace, $subNameSpace, $defName, $defs): void
    {
        $ns = new PhpNamespace($namespace . '\\' . $subNameSpace);
        $className = $this->calculateClassName($defName, $defs);
        if ($className == "array") {
            return;
        }
        if (isset($defs['type'])) {
            if ($defs['type'] == "string") {
                return;
            }
            if ($defs['type'] == "array") {
                return;
            }
        }
        $class = $ns->addClass($className);
        if (!empty($defs['description'])) {
            $comment = $defs['description'];
            $comment = $this->formatComment($comment);
            $class->addComment($comment);
        }
        $class->addComment("generated from: $defName");

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
                        $parameter['type'] = $nestedClassName;
                        if (isset($this->definitions[$nestedClassId])) {
                            if ($parameter != $this->definitions[$nestedClassId]) {
                                throw new Exception("Not yet implemented:
                                The schema defines a nested class with same name but different properties,
                                in this case the classname must be generated in unique way.                               
                                ");
                            }
                        } else {

                            $this->definitions[$nestedClassId] = $parameter;
                            $this->generateModelClass($namespace, $subNameSpace, $nestedClassId, $parameter);
                        }
                    }
                    if ($parameter['type'] === 'array') {
                        if (isset($parameter['items'])) {
                            $arrayItemsDef = $parameter['items'];
                            $itemType = "mixed";
                            if (isset($arrayItemsDef['$ref'])) {
                                $ref = $this->getRefNameFromRefString($parameter['items']['$ref']);
                                if (isset($this->references[$ref])) {
                                    $itemType = $this->references[$ref];
                                }
                            }
                            if (isset($arrayItemsDef['type'])) {
                                $itemType = $arrayItemsDef['type'];
                            }
                            $parameter['type'] = "array<$itemType>";

                        }
                    }
                    if (is_array($parameter['type'])) {
                        $parameter['type'] = implode('|', $parameter['type']);
                    }

                    $propType = $parameter['type'];
                    $propDef = $parameter;
                    $this->addProperty($propDef, $name, $class, $propType);

                } else {
                    // use the $this->references[] map here when you come across a reference
                    if (!empty($parameter['$ref'])) {
                        $ref = $this->getRefNameFromRefString($parameter['$ref']);
                        if (isset($this->references[$ref])) {
                            $propType = $this->references[$ref];
                            $propDef = $this->definitions[$ref];
                            $this->addProperty($propDef, $name, $class, $propType);
                        }
                    }
                }
            }
        }
        $ns->addUse(JsonSerializable::class);
        $class->addImplement(JsonSerializable::class);
        $ns->addUse($namespace . '\\BaseModel');
        $class->addTrait($namespace . '\\BaseModel');

        $this->writeClassFile($subNameSpace, $className, $ns);
    }

    /**
     * @param $methodName
     */
    protected function cleanName($methodName): string
    {
        $methodName = ucwords($methodName, $delimiters = " \t\r\n\f\v-_");
        $methodName = implode('', explode(' ', $methodName));
        return preg_replace("/[^A-Za-z0-9 ]/", '', $methodName);
    }

    /**
     * @param $name
     */
    protected function cleanConstantName($name): string
    {
        $name = preg_replace("/[^A-Za-z0-9 ]/", '_', $name);
        $name = implode('_', explode(' ', $name));
        return strtoupper($name);
    }

    /**
     * @param $comment
     * @return string|string[]|null
     */
    private function formatComment($comment)
    {
        $comment = preg_replace("/(.{1,110})(?:\n|$| )/", "$1\n", $comment);
        return $comment;
    }

    /**
     * @param $propDef
     * @param $property
     * @param $name
     * @param \Nette\PhpGenerator\ClassType $class
     */
    private function addProperty($propDef, $name, \Nette\PhpGenerator\ClassType $class, $propType): void
    {
        $property = $class->addProperty($name)
            ->setVisibility('public')
            ->setComment('@var ' . $propType);

        if (isset($propDef['description'])) {
            $propDesc = $propDef['description'];
            $property->addComment($this->formatComment($propDesc));
        }
        if (isset($propDef['x-enum'])) {
            $enums = $propDef['x-enum'];
            $property->addComment("use one of constants defined in this class to set the value:");
            foreach ($enums as $constantDef) {
                if (isset($constantDef['value']) ) {
                    $value = $constantDef['value'];
                    $constantName = $this->cleanConstantName($name . '_' . $value);
                    $property->addComment("@see $constantName");
                    $classConstant = $class->addConstant($constantName, $value);
                    if (isset($constantDef['description'])) {
                        $classConstant->addComment($constantDef['description']);
                    }
                }
            }
        }
        if (isset($propDef['minLength']) && $propDef['minLength'] > 0) {
            $property->addComment("minLength: " . $propDef['minLength']);
        }
        if (isset($propDef['maxLength'])) {
            $property->addComment("maxLength: " . $propDef['maxLength']);
        }
    }
}


