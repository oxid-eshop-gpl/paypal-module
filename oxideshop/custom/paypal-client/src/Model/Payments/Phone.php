<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-phone.json
 */
class Phone implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $country_code;

    /** @var string */
    public $national_number;

    /** @var string */
    public $extension_number;
}
