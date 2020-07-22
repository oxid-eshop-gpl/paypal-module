<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The phone information.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-phone_with_type.json
 */
class PhoneWithType implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The phone type.
     */
    public $phone_type;

    /**
     * @var Phone
     * The phone number, in its canonical international [E.164 numbering plan
     * format](https://www.itu.int/rec/T-REC-E.164/en).
     */
    public $phone_number;

    public function validate()
    {
        assert(isset($this->phone_number));
    }
}
