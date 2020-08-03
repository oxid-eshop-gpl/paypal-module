<?php

require __DIR__ . '/vendor/autoload.php';

$generator = new \OxidProfessionalServices\ServiceGenerator();
$files = scandir('../paypal-client/schema');
foreach ($files as $file) {
    $apiName = str_replace('.json', '', $file);

    $file = "../paypal-client/schema/" . $file;

    if (!is_file($file)) {
        continue;
    }

    echo "Generating $apiName API" . PHP_EOL;

    $generator->generateServiceAndModels(
        $file,
        'OxidProfessionalServices\PayPal\Api\Service',
        'OxidProfessionalServices\PayPal\Api\Model',
        $apiName
    );
}

echo "done";
