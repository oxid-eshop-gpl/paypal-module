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
     */
    public $account_number;

    /**
     * @var string
     * The 9-digit ABA routing transit number for the bank at which the account is held.
     */
    public $routing_number;

    /**
     * @var string
     * Represents the type of the bank account.  If not provided, default is CHECKING.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCOUNT_TYPE_CHECKING
     * @see ACCOUNT_TYPE_SAVINGS
     */
    public $account_type;

    /**
     * @var string
     * Name of the person or business that owns the bank account.
     */
    public $account_holder_name;
}
