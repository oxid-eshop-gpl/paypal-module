<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
    public $account_type = 'CHECKING';

    /**
     * @var string
     * Name of the person or business that owns the bank account.
     *
     * minLength: 1
     * maxLength: 300
     */
    public $account_holder_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->account_number) || Assert::minLength($this->account_number, 3, "account_number in AchDebit must have minlength of 3 $within");
        !isset($this->account_number) || Assert::maxLength($this->account_number, 17, "account_number in AchDebit must have maxlength of 17 $within");
        !isset($this->routing_number) || Assert::minLength($this->routing_number, 9, "routing_number in AchDebit must have minlength of 9 $within");
        !isset($this->routing_number) || Assert::maxLength($this->routing_number, 9, "routing_number in AchDebit must have maxlength of 9 $within");
        !isset($this->account_type) || Assert::minLength($this->account_type, 1, "account_type in AchDebit must have minlength of 1 $within");
        !isset($this->account_type) || Assert::maxLength($this->account_type, 255, "account_type in AchDebit must have maxlength of 255 $within");
        !isset($this->account_holder_name) || Assert::minLength($this->account_holder_name, 1, "account_holder_name in AchDebit must have minlength of 1 $within");
        !isset($this->account_holder_name) || Assert::maxLength($this->account_holder_name, 300, "account_holder_name in AchDebit must have maxlength of 300 $within");
    }

    public function __construct()
    {
    }
}
