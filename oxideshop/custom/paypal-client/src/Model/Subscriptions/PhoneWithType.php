<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The phone information.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-phone_with_type.json
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
     *
     * this is mandatory to be set
     */
    public $phone_number;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->phone_number, "phone_number in PhoneWithType must not be NULL $within");
         Assert::isInstanceOf($this->phone_number, Phone::class, "phone_number in PhoneWithType must be instance of Phone $within");
         $this->phone_number->validate(PhoneWithType::class);
    }

    public function __construct()
    {
    }
}
