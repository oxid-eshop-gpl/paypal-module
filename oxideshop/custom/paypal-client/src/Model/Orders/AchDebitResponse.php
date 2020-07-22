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

    /**
     * @var string
     * The last 4 digits of the bank account number.
     */
    public $last_digits;

    /**
     * @var string
     * The 9-digit ABA routing transit number for the bank at which the account is held.
     */
    public $routing_number;

    /**
     * @var string
     * Name of the person or business that owns the bank account.
     */
    public $account_holder_name;
}
