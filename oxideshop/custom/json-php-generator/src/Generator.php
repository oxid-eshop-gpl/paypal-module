<?php

namespace OxidProfessionalServices;

use Exception;
use JsonSerializable;
use Nette\PhpGenerator\ClassType;
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
     * @var PhpNamespace
     */
    private $currentNameSpace;
    private $subNameSpace;

    protected $knownClasses;

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $subNameSpace
     */
    public function generateModels($jsonFile, $namespace, $subNameSpace): void
    {
        $this->readDefinition($jsonFile);

        $this->buildRefs($subNameSpace);

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
        if (!file_put_contents($className, '<?php' . PHP_EOL . PHP_EOL . $phpContent)) {
            echo "error writing file " . $className . PHP_EOL;
        }
    }

    /**
     * @param $defName
     * @return string|string[]
     */
    private function getRefNameFromRefString($defName)
    {

        if(strstr($defName, '#/definitions/')) {
            $defName = str_replace('/', '-', $defName);
            $defName = str_replace('#-definitions-', '', $defName);
        } else {
            if(strstr($defName, 'CommonComponentsSpecification')) {
                $defNameArray = explode('/', $defName);
                $defName = end($defNameArray);
            }
        }

        return $defName;
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
        if (isset($this->references[$defName])) {
            $className = $this->references[$defName];
            if (preg_match("/\\\\(.*)$/", $className, $matches)) {
                $className = $matches[1];
            }
            return $className;
        }


        $refName = $this->getRefNameFromRefString($defName);
        $refName = preg_replace('/customized_x_unsupported_[0-9]+_(.*)/', '$1', $refName);
        $className = $this->replaceNumbers($this->getClassNameFromRefName($refName));
        if ($className == "LinkSchema" || $className == "Error" || $className == "LinkDescription") {
            $this->definitions[$defName]['type'] = 'mixed';
                return "mixed";
        }

        if (!$this->isFqnInRef($defName)) {
            $uniqueName = str_replace('-', '_', $refName);
            $uniqueName = str_replace('model', '', $uniqueName);
            $uniqueName = $this->replaceNumbers($this->getClassNameFromRefName($uniqueName));
            $className = $uniqueName;

        }

        return $className;
    }


    protected $uniqueType = [];

   /**
    * @return void
    */
    protected function buildRefs($modelNamespace): void
    {
        $this->references = [];
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
                    //TODO: for each ref generate a hash
                    //there might be classes with the same name but different properties
                    //store class name and hash hash=> classname and classname => hash

                    $className = $this->calculateClassName($defName, $defs);

                    if ($className !== "mixed") {
                        $className = $modelNamespace . '\\' . $className;

                        $thisHash = $this->calculateHash($defs);
                        $i = 2;
                        $baseClassName = $className;
                        while (isset($this->knownClasses[$className]) && $this->knownClasses[$className] != $thisHash) {
                            $className = $baseClassName . $i++;
                        }
                        $this->knownClasses[$className] = $this->calculateHash($defs);
                    }
                    if (isset($this->references[$defName])) {
                        throw new Exception("duplicate Class Definition");
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
        if (is_dir($jsonFile)) {
            return;
        }
        $this->fileContent = json_decode(file_get_contents($jsonFile), true);
        $definitions = $this->fileContent['definitions'] ?? [];
        $path_parts = pathinfo($jsonFile);
        $dirName = $path_parts['dirname'] . '/' . $path_parts['filename'];
        $definitions = $this->readDefinitionsFromDir($dirName, $definitions);
        $this->definitions = $definitions;
    }

    /**
     * @param $namespace
     * @param $subNameSpace
     * @param $defName
     * @param $defs
     */
    private function generateModelClass($namespace, $subNameSpace, $defName, $defs): void
    {
        $className = $this->calculateClassName($defName, $defs);

        $this->currentNameSpace = $ns = new PhpNamespace($namespace . '\\' . $subNameSpace);
        $this->subNameSpace = $subNameSpace;
        $ns->getName();
        $ns->addUse(Assert::class);
        if ($className == "array" || $className == "") {
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
        $class->addComment($this->formatComment("generated from: $defName"));
        if ($className == "Error" || $className == "ErrorDetails") {
            return;
        }
        $properties = [];
        $parent = "";
        $hasParent = false;
        if (isset($defs['allOf'])) {
            foreach ($defs['allOf'] as $partialDef) {
                if (isset($partialDef['$ref'])) {
                    $ref = $this->getRefNameFromRefString($partialDef['$ref']);
                    if (!$hasParent) {
                        $parent = $this->references[$ref] ?? "";
                        if ($parent == "string" || $parent == "") {
                            continue;
                        }
                        $this->useRef($ref);
                        $class->addExtend($namespace . '\\' . $parent);
                        $hasParent = true;
                        continue;
                    }
                    $partialDef = $this->definitions[$ref];
                }

                $properties = array_merge($properties, $partialDef['properties']);
            }
            $defs['properties'] = $properties;
        }

        $hasProperties = isset($defs['properties']) && $defs['properties'];
        if (!($hasProperties || $hasParent)) {
            $this->markAsScalar($className);
            return;
        }

        if ($hasProperties) {
            $validateMethod = $class->addMethod('validate')->setVisibility('public');
            $mapMethod = $class->addMethod('map')->setVisibility('private');
            $constructor = $class->addMethod("__construct")->setVisibility('public');
            $constructor->addParameter('data')->setDefaultValue(null)->setType('array');
            if ($parent != "") {
                $constructor->addBody("parent::__construct(\$data);");
            }
            $mapMethod->addParameter("data")->setType('array');

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
                                    $itemType = $this->useRef($ref);
                                } elseif ($this->isCommonType($ref)) {
                                    $nestedClassId = $this->calculateClassName($ref, null);
                                    $itemType = $nestedClassId;
                                    if ($itemType != "mixed") {
                                        $ns->addUse("$namespace\\$subNameSpace\\$nestedClassId");
                                    }
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
                } elseif (!empty($parameter['$ref'])) {
                    // use the $this->references[] map here when you come across a reference
                    $ref = $this->getRefNameFromRefString($parameter['$ref']);
                    if (isset($this->references[$ref])) {
                        $propType = $this->useRef($ref);
                        $propDef = $this->definitions[$ref];
                        $this->addProperty($propDef, $name, $class, $propType, $defs);
                    }
                }
            }
            $constructor->addBody("if (isset(\$data)) {");
            $constructor->addBody("    \$this->map(\$data);");
            $constructor->addBody("}");
        }

        $ns->addUse(JsonSerializable::class);
        $class->addImplement(JsonSerializable::class);
        $ns->addUse($namespace . '\\BaseModel');
        $class->addTrait($namespace . '\\BaseModel');

        $this->writeClassFile($subNameSpace, $className, $ns);
    }

    /**
     * @param string $ref the reference from the schema
     * @return string the type/relative classname
     */
    public function useRef($ref)
    {
        $subNameSpace = $this->subNameSpace;
        $nameSpace = $this->currentNameSpace->getName();
        $baseNameSpace = substr($nameSpace, 0, strlen($subNameSpace) * -1);
        $propType = $this->references[$ref];
        if (preg_match('/(.*)\\\\(.*)/', $propType, $matches)) {
            $refFull = $baseNameSpace . $propType;
            $propType = $matches[2];
            if ($matches[1] !== $subNameSpace) {
                $this->currentNameSpace->addUse($refFull);
            }
        }
        return $propType;
    }

    /**
     * @param string $ref the reference from the schema
     * @return string|null the relative namespace for the common type
     */
    protected function getSubNameSpaceForCommonTypes($ref)
    {
        $subNameSpace = null;
        if ($this->isCommonTypeV3($ref)) {
            $subNameSpace = 'CommonV3';
        } elseif ($this->isCommonTypeV4($ref)) {
            $subNameSpace = 'CommonV4';
        } elseif ($this->isMerchantV1($ref)) {
            $subNameSpace = 'MerchantV1';
        }
        return $subNameSpace;
    }

    /**
     * @param string $ref the reference from the schema
     * @return bool true if the reference is referencing a common type
     */
    protected function isCommonType($ref)
    {
        if (strpos($ref, 'customized') !== false) {
            return false;
        }

        return $this->isCommonTypeV3($ref) || $this->isCommonTypeV4($ref) || $this->isMerchantV1($ref);
    }

    /**
     * @param string $ref the reference from the schema
     * @return bool true if the reference is referencing a common type
     */
    protected function isCommonTypeV4($ref)
    {
        return strpos($ref, 'components-v4') !== false;
    }

    /**
     * @param string $ref the reference from the schema
     * @return bool true if the reference is referencing a common type
     */
    protected function isMerchantV1($ref)
    {
        return false;
        //I tried
        // return strpos($ref, 'MerchantsCommonComponentsSpecification-v1') !== false
        //            || strpos($ref, 'MerchantCommonComponentsSpecification-v1') !== false
        //            || strpos($ref, 'merchant.CommonComponentsSpecification-v1') !== false
        //            ;
        //but the quality of there common classes does not allow to
        //to build a common set of merchant classes.
        //it was not possible to reuse common components because they sometimes do differ
        //and reference specific objects where they should only reference the common type
    }

    /**
     * @param string $ref the reference from the schema
     * @return bool true if the reference is referencing a common type
     */
    protected function isFqnInRef($ref)
    {
        return $this->isCommonType($ref)
            || strpos($ref, 'customer_common') !== false
            || strpos($ref, 'CommonComponents') !== false
            || strpos($ref, 'common_components') !== false
            || strpos($ref, 'customized') !== false
            ;
    }
    /**
     * @param string $ref the reference from the schema
     * @return bool true if the reference is referencing a common type
     */
    protected function isCommonTypeV3($ref)
    {
        return strpos($ref, 'components-v3') !== false;
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
    protected function formatComment($comment)
    {
        $comment = preg_replace("/(.{1,110})(?:\n|$| )/", "$1\n", $comment);
        return $comment;
    }


    /**
     * @param $propDef
     * @param $property
     * @param $name
     * @param ClassType $class
     */
    private function addProperty($propDef, $name, ClassType $class, $propType, $classDef): void
    {
        $validateMethod = $class->getMethod('validate');
        $mapMethod = $class->getMethod('map');
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
        } else {
            if ($this->isObjectType($propType)) {
                $methodName = "init" . $this->getClassNameFromRefName($name);
                $class->addMethod($methodName)->setReturnType($this->currentNameSpace->getName() . '\\' . $propType)
                    ->addBody('return $this' . "->$name = new ${propType}();");
            }
        }
        if ($propType === "mixed[]") {
            $propType = 'array';
        }
        $propType = $propType == "integer" ? 'int' : $propType;
        $typehint =  $required ? $propType : "$propType | null";
        $property->addComment('@var ' . $typehint);


        if (isset($propDef['minItems'])) {
            $minItems = $propDef['minItems'];
            $property->addComment("maxItems: " . $minItems);
            $validateMethod->addBody("${emptyOr}Assert::minCount(");
            $validateMethod->addBody("    \$this->$name,");
            $validateMethod->addBody("    $minItems,");
            $validateMethod->addBody("    \"$name in $className must have min. count of $minItems \$within\"");
            $validateMethod->addBody(");");
        }

        if (isset($propDef['maxItems'])) {
            $maxItems = $propDef['maxItems'];
            $property->addComment("maxItems: " . $maxItems);
            $validateMethod->addBody("${emptyOr}Assert::maxCount(");
            $validateMethod->addBody("    \$this->$name,");
            $validateMethod->addBody("    $maxItems,");
            $validateMethod->addBody("    \"$name in $className must have max. count of $maxItems \$within\"");
            $validateMethod->addBody(");");
        }

        if (isset($propDef['minLength']) && $propDef['minLength'] > 0) {
            $minLength = $propDef['minLength'];
            $property->addComment("minLength: " . $minLength);
            $validateMethod->addBody("${emptyOr}Assert::minLength(");
            $validateMethod->addBody("    \$this->$name,");
            $validateMethod->addBody("    $minLength,");
            $validateMethod->addBody("    \"$name in $className must have minlength of $minLength \$within\"");
            $validateMethod->addBody(");");
        }
        if (isset($propDef['maxLength'])) {
            assert(!isset($this->value) || $this->value < 0);
            $maxLength = $propDef['maxLength'];
            $validateMethod->addBody("${emptyOr}Assert::maxLength(");
            $validateMethod->addBody("    \$this->$name,");
            $validateMethod->addBody("    $maxLength,");
            $validateMethod->addBody("    \"$name in $className must have maxlength of $maxLength \$within\"");
            $validateMethod->addBody(");");
            $property->addComment("maxLength: " . $maxLength);
        }
        $mapMethod->addBody("if (isset(\$data['$name'])) {");
        if ($this->isObjectType($propType)) {
            $mapMethod->addBody("    \$this->$name = new $propType(\$data['$name']);");
            $validateMethod->addBody("${emptyOr}Assert::isInstanceOf(");
            $validateMethod->addBody("    \$this->$name,");
            $validateMethod->addBody("    $propType::class,");
            $validateMethod->addBody("    \"$name in $className must be instance of $propType \$within\"");
            $validateMethod->addBody(");");
            $validateMethod->addBody("$emptyOr \$this->${name}->validate($className::class);");
        } elseif ($this->isArrayType($propType)) {
            $validateMethod->addBody("${emptyOr}Assert::isArray(");
            $validateMethod->addBody("    \$this->$name,");
            $validateMethod->addBody("    \"$name in $className must be array \$within\"");
            $validateMethod->addBody(");");
            $mapMethod->addBody("    \$this->$name = [];");
            $mapMethod->addBody("    foreach (\$data['$name'] as \$item) {");

            $itemType = false;
            if (preg_match("/(.*)\[\]/", $propType, $matches)) {
                $itemType = $matches[1];
            }
            $mapItem = "        \$this->${name}[] = \$item;";
            if ($itemType) {
                if ($this->isObjectType($itemType)) {
                    $mapItem = "        \$this->${name}[] = new ${itemType}(\$item);";
                    $validateMethod->addBody("if (isset(\$this->$name)) {");
                    $validateMethod->addBody("    foreach (\$this->$name as \$item) {");
                    $validateMethod->addBody("        \$item->validate($className::class);");
                    $validateMethod->addBody("    }");
                    $validateMethod->addBody("}");
                }
            }
            $mapMethod->addBody($mapItem);
            $mapMethod->addBody('    }');
        } else {
            $mapMethod->addBody("    \$this->$name = \$data['$name'];");
        }
        $mapMethod->addBody("}");
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
            && $propType != "int"
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

    /**
     * debug function to check what kind of types are skipped because they
     * do have no properties and may be simple strings.
     * So far there are no issues with that types because the three are only referenced as patterns
     * but they may become an issue if they are getting
     * referenced
     * somewhere. In future this types should be recognized as scalar types by the isObjectType method
     * @param $className
     */
    protected function markAsScalar($className)
    {
        $this->scalarTypes[$className] = 'string';
        file_put_contents(
            __DIR__ . '/scalarTypes.json',
            json_encode($this->scalarTypes, JSON_PRETTY_PRINT)
        );
    }


    /**
     * @param string $dirName
     * @param array $definitions
     * @return array
     */
    protected function readDefinitionsFromDir(string $dirName, array $definitions): array
    {
        if (is_dir($dirName)) {
            $files = scandir($dirName);
            foreach ($files as $file) {
                if ($file == '.' || $file == '..') {
                    continue;
                }
                $full_file = $dirName . '/' . $file;
                if (is_file($full_file)) {
                    $definitions[$file] = json_decode(file_get_contents($full_file), true);
                }
                if (is_dir($full_file)) {
                    $definitions = $this->readDefinitionsFromDir($full_file, $definitions);
                }
            }
        }
        return $definitions;
    }

    protected function calculateHash($defs)
    {
        unset($defs['comment']);
        unset($defs['description']);
        unset($defs['x-pattern']);
        if (isset($defs['properties'])) {
            $propHashes = [];
            foreach ($defs['properties'] as $prop) {
                $propHashes[] = $this->calculateHashForProp($prop);
            }
            $defs['properties'] = $propHashes;
        }
        $json_encode = json_encode($defs, JSON_PRETTY_PRINT);
        $json_encode = str_replace(
            "MerchantCommonComponentsSpecification",
            "MerchantsCommonComponentsSpecification",
            $json_encode
        );
        $json_encode = str_replace(
            "merchant.CommonComponentsSpecification",
            "MerchantsCommonComponentsSpecification",
            $json_encode
        );
        return $json_encode;
    }

    public function calculateHashForProp($prop)
    {
        unset($prop['description']);
        if (isset($prop['$ref'])) {
            $ref = $this->getRefNameFromRefString($prop['$ref']);
            if (isset($this->definitions[$ref])) {
                $prop['$ref'] = $this->calculateHash($this->definitions[$ref]);
            }
        }
        return $prop;
    }

}
