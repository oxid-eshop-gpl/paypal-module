<?php

namespace OxidProfessionalServices;

use Nette\PhpGenerator\PhpNamespace;

class Generator
{
    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $className
     */
    public function __construct($jsonFile, $namespace, $className)
    {
        $this->generateClass($jsonFile, $namespace, $className);
    }

    /**
     * @param string $jsonFile
     * @param string $namespace
     * @param string $className
     */
    private function generateClass($jsonFile, $namespace, $className): void
    {
        $fileContent = json_decode(file_get_contents($jsonFile), true);

        foreach ($fileContent['definitions'] as $key => $defs) {
            $ns = new PhpNamespace($namespace . '\\' . $className);

            if (empty($defs['title'])) {
                if (isset($defs['format'])) {
                    $defs['title'] = $defs['format'];
                } else {
                    continue;
                }
            }

            $title = implode('', explode(' ', $defs['title']));
            $title = preg_replace("/[^A-Za-z0-9 ]/", '', $title);
            $fileName = $title;
            $class = $ns->addClass($title);
            $class->addComment($defs['description']);

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
                }
            }

            $this->writeClassFile($className, $fileName, $ns);
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
            if(empty($value['type'])) {
                // This may need further investigation
                continue;
            }

            $class->addProperty($key)
                ->setVisibility('public')
                ->setComment('@var ' . $value['type']);
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
}
