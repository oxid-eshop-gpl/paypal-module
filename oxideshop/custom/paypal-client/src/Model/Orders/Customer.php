<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details about a customer in merchant's or partner's system of records.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-customer.json
 */
class Customer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The unique ID for a customer in merchant's or partner's system of records.
     *
     * minLength: 1
     * maxLength: 22
     */
    public $id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in Customer must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 22, "id in Customer must have maxlength of 22 $within");
    }

    public function __construct()
    {
    }
}
