<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $id;
}