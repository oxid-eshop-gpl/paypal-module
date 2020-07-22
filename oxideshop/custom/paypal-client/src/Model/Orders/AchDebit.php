<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * ACH bank details required to fund the payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit.json
 */
class AchDebit implements JsonSerializable
{
    use BaseModel;

    /** Bank account of type CHECKING. */
    const ACCOUNT_TYPE_CHECKING = 'CHECKING';

    /** Bank account of type SAVINGS. */
    const ACCOUNT_TYPE_SAVINGS = 'SAVINGS';

    /**
     * @var string
     * The US bank account number from which the payment will be debited.
     *
     * minLength: 3
     * maxLength: 17
     */
    public $account_number;

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
     * Represents the type of the bank account.  If not provided, default is CHECKING.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCOUNT_TYPE_CHECKING
     * @see ACCOUNT_TYPE_SAVINGS
     * minLength: 1
     * maxLength: 255
     */
    public $account_type;

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
        assert(!isset($this->account_number) || strlen($this->account_number) >= 3);
        assert(!isset($this->account_number) || strlen($this->account_number) <= 17);
        assert(!isset($this->routing_number) || strlen($this->routing_number) >= 9);
        assert(!isset($this->routing_number) || strlen($this->routing_number) <= 9);
        assert(!isset($this->account_type) || strlen($this->account_type) >= 1);
        assert(!isset($this->account_type) || strlen($this->account_type) <= 255);
        assert(!isset($this->account_holder_name) || strlen($this->account_holder_name) >= 1);
        assert(!isset($this->account_holder_name) || strlen($this->account_holder_name) <= 300);
    }
}
