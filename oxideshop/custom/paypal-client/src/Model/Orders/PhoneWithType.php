<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->phone_number) || Assert::notNull($this->phone_number->country_code, "country_code in phone_number must not be NULL within PhoneWithType $within");
        !isset($this->phone_number) || Assert::notNull($this->phone_number->national_number, "national_number in phone_number must not be NULL within PhoneWithType $within");
        !isset($this->phone_number) || Assert::isInstanceOf($this->phone_number, Phone::class, "phone_number in PhoneWithType must be instance of Phone $within");
        !isset($this->phone_number) || $this->phone_number->validate(PhoneWithType::class);
    }

    public function __construct()
    {
    }
}
