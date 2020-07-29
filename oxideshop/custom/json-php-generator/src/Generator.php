<?php

namespace OxidProfessionalServices;

use Exception;
use JsonSerializable;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use Webmozart\Assert\Assert;

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

        shell_exec('rm -rf ../paypal-client/generated/Model/' . $subNameSpace);


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
            '../paypal-client/generated/Model/' . $subNameSpace
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
        if ($className == "LinkSchema") {
            $x = 1;
            $this->definitions[$defName]['type'] = 'mixed';
                 return "mixed";
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
        $ns->addUse(Assert::class);
        $className = $this->calculateClassName($defName, $defs);
        if ($className == "array") {
            return;
        }
        if (isset($defs['type'])) {
            if (!$this->isObjectType($defs['type'])) {
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
        if ($className == "Error" || $className == "ErrorDetails") {
            return;
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
            $validateMethod = $class->addMethod('validate')->setVisibility('public');
            $constructor = $class->addMethod("__construct")->setVisibility('public');

            $validateMethod->addParameter("from")->setDefaultValue(null);
            $validateMethod->addBody('$within = isset($from) ? "within $from" : ""; ');
            foreach ($defs['properties'] as $name => $parameter) {
                if (isset($parameter['type'])) {
                    if ($parameter['type'] === 'object') {
                        $nestedClassId = $className . '_' . $name;
                        $nestedClassName = $this->calculateClassName($nestedClassId, $parameter);
                        $parameter['type'] = $nestedClassName;
                        if (isset($this->definitions[$nestedClassId])) {
                            if ($parameter != $this->definitions[$nestedClassId]) {
                                //fixme
                                /* print "Not yet implemented:
                                The schema defines a nested class $nestedClassName again but different properties,
                                in this case the classname must be generated in unique way.
                                "; */
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
                            $parameter['type'] = "${itemType}[]";
                        }
                    }
                    if (is_array($parameter['type'])) {
                        $parameter['type'] = implode('|', $parameter['type']);
                    }

                    $propType = $parameter['type'];
                    $propDef = $parameter;
                    $this->addProperty($propDef, $name, $class, $propType, $defs);
                } else {
                    // use the $this->references[] map here when you come across a reference
                    if (!empty($parameter['$ref'])) {
                        $ref = $this->getRefNameFromRefString($parameter['$ref']);
                        if (isset($this->references[$ref])) {
                            $propType = $this->references[$ref];
                            $propDef = $this->definitions[$ref];
                            $this->addProperty($propDef, $name, $class, $propType, $defs);
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
    private function addProperty($propDef, $name, \Nette\PhpGenerator\ClassType $class, $propType, $classDef): void
    {
        $validateMethod = $class->getMethod('validate');
        $constructor = $class->getMethod('__construct');
        $property = $class->addProperty($name)
            ->setVisibility('public');

        if (isset($propDef['description'])) {
            $propDesc = $propDef['description'];
            $property->addComment($this->formatComment($propDesc));
        }
        if (isset($propDef['x-enum'])) {
            $enums = $propDef['x-enum'];
            $property->addComment("use one of constants defined in this class to set the value:");
            foreach ($enums as $constantDef) {
                if (isset($constantDef['value'])) {
                    $value = $constantDef['value'];
                    $constantName = $this->cleanConstantName($name . '_' . $value);
                    $property->addComment("@see $constantName");
                    $classConstant = $class->addConstant($constantName, $value)->setVisibility('public');
                    if (isset($constantDef['description'])) {
                        $classConstant->addComment($constantDef['description']);
                    }
                }
            }
        }
        if (isset($propDef['default'])) {
            $property->setValue($propDef['default']);
        }
        $emptyOr = "!isset(\$this->$name) || ";
        $className = $class->getName();

        $required = false;

        //purchase_units do have set minItems and are required but the schema does not explicitly set required to true
        if (isset($propDef['minItems'])) {
            $required = true;
        }

        if (isset($classDef['required'])) {
            if (array_search($name, $classDef['required']) !== false) {
                $required = true;
            }
        }

        if ($required) {
            $validateMethod->addBody(
                "Assert::notNull(\$this->$name, \"$name in $className must not be NULL \$within\");"
            );
            $emptyOr = "";
            if ($this->isObjectType($propType)) {
                $constructor->addBody("\$this->$name = new ${propType}();");
            }
            if ($this->isArrayType($propType)) {
                $constructor->addBody("\$this->$name = [];");
            }
        }
        $typehint =  $required ? $propType : "$propType | null";
        $property->addComment('@var ' . $typehint);


        if (isset($propDef['minItems'])) {
            $minItems = $propDef['minItems'];
            $property->addComment("maxItems: " . $minItems);
            $validateMethod->addBody(
                "${emptyOr}Assert::minCount(
    \$this->$name,
    $minItems,
    \"$name in $className must have min. count of $minItems \$within\"
);"
            );
        }

        if (isset($propDef['maxItems'])) {
            $maxItems = $propDef['maxItems'];
            $property->addComment("maxItems: " . $maxItems);
            $validateMethod->addBody(
                "${emptyOr}Assert::maxCount(
    \$this->$name,
    $maxItems,
    \"$name in $className must have max. count of $maxItems \$within\"
);"
            );
        }

        if (isset($propDef['minLength']) && $propDef['minLength'] > 0) {
            $minLength = $propDef['minLength'];
            $property->addComment("minLength: " . $minLength);
            $validateMethod->addBody(
                "${emptyOr}Assert::minLength(
    \$this->$name,
    $minLength,
    \"$name in $className must have minlength of $minLength \$within\"
);"
            );
        }
        if (isset($propDef['maxLength'])) {
            assert(!isset($this->value) || $this->value < 0);
            $maxLength = $propDef['maxLength'];
            $validateMethod->addBody(
                "${emptyOr}Assert::maxLength(
    \$this->$name,
    $maxLength,
    \"$name in $className must have maxlength of $maxLength \$within\"
);"
            );
            $property->addComment("maxLength: " . $maxLength);
        }

        if ($this->isObjectType($propType)) {
            $validateMethod->addBody(
                "${emptyOr}Assert::isInstanceOf(
    \$this->$name,
    $propType::class,
    \"$name in $className must be instance of $propType \$within\"
);"
            );
            $validateMethod->addBody("$emptyOr \$this->${name}->validate($className::class);");
        }
        if (strpos($propType, '[') !== false || strpos($propType, 'array') === 0) {
            $validateMethod->addBody(
                "${emptyOr}Assert::isArray(
    \$this->$name,
    \"$name in $className must be array \$within\"
);"
            );
            $itemType = false;
            if (preg_match("/(.*)\[\]/", $propType, $matches)) {
                $itemType = $matches[1];
            }
            if ($itemType) {
                if ($this->isObjectType($itemType)) {
                    $validateMethod->addBody("
if (isset(\$this->$name)) {
    foreach (\$this->$name as \$item) {
        \$item->validate($className::class);
    }
}
                        ");
                }
            }
        }
    }

    private function isObjectType($propType)
    {
        if (strpos($propType, '|') !== false) {
            return false;
        }
        if ($this->isArrayType($propType)) {
            return false;
        }
        return $propType != "string"
            && $propType != "integer"
            && $propType != "mixed"
            && $propType != "boolean"
            && $propType != "mixed";
    }

    private function isArrayType($propType)
    {
        if (strpos($propType, '|') !== false) {
            return false;
        }
        if (strpos($propType, 'array') === 0) {
            return true;
        }
        if (strpos($propType, '[') !== false) {
            return true;
        }
        return false;
    }
}
