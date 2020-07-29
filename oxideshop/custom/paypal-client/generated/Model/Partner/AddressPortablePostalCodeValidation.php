<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * generated from: customer_common-v1-schema-common_components-v4-schema-json-openapi-2.0-address_portable_postal_code_validation.json
 */
class AddressPortablePostalCodeValidation implements JsonSerializable
{
    use BaseModel;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    public function __construct()
    {
    }
}
