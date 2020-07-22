<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The name and address, typically used for billing and shipping purposes.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v4-schema-json-openapi-2.0-address_name.json
 */
class AddressName extends AddressPortable implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The name on the address, for example,  Mr J. Smith.
     *
     * minLength: 1
     * maxLength: 200
     */
    public $addressee;

    public function validate()
    {
        assert(!isset($this->addressee) || strlen($this->addressee) >= 1);
        assert(!isset($this->addressee) || strlen($this->addressee) <= 200);
    }
}
