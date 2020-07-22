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
     *
     * minLength: 4
     * maxLength: 4
     */
    public $last_digits;

    /**
     * @var string
     * The 9-digit ABA routing transit number for the bank at which the account is held.
     *
     * minLength: 9
     * maxLength: 9
     */
    public $routing_number;

    /**
     * @var string
     * Name of the person or business that owns the bank account.
     *
     * minLength: 1
     * maxLength: 300
     */
    public $account_holder_name;

    public function validate()
    {
        assert(!isset($this->last_digits) || strlen($this->last_digits) >= 4);
        assert(!isset($this->last_digits) || strlen($this->last_digits) <= 4);
        assert(!isset($this->routing_number) || strlen($this->routing_number) >= 9);
        assert(!isset($this->routing_number) || strlen($this->routing_number) <= 9);
        assert(!isset($this->account_holder_name) || strlen($this->account_holder_name) >= 1);
        assert(!isset($this->account_holder_name) || strlen($this->account_holder_name) <= 300);
    }
}
