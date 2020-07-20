<?php

require __DIR__ . '/vendor/autoload.php';

$files = scandir('../paypal-client/schema');

shell_exec('rm -rf ../paypal-client/src/Model');

foreach($files as $file) {
    if($file === '.' || $file === '..') {
        continue;
    }

    $apiName = str_replace('.json', '', $file);

    echo "Generating $apiName API" . PHP_EOL;

    $generator = new \OxidProfessionalServices\Generator(
        '../paypal-client/Schema/' . $file,
        'OxidProfessionalServices\PayPal\Model',
        $apiName
    );
}

echo "done";
