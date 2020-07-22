<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business name of the party.
 *
 * generated from: customer_common-v1-schema-common_components-v4-schema-json-openapi-2.0-business_name.json
 */
class BusinessName implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Required. The business name of the party.
     *
     * maxLength: 300
     */
    public $business_name;

    public function validate()
    {
        assert(!isset($this->business_name) || strlen($this->business_name) <= 300);
    }
}
