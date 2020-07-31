<?php

namespace OxidProfessionalServices\PayPal\Api\Model\CommonV4;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v4-schema-json-openapi-2.0-name_validation.json
 */
class NameValidation implements JsonSerializable
{
    use BaseModel;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
