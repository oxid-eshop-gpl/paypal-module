<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * ACH bank details response object
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit_response.json
 */
class AchDebitResponse implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $last_digits;

    /** @var string */
    public $routing_number;

    /** @var string */
    public $account_holder_name;
}
