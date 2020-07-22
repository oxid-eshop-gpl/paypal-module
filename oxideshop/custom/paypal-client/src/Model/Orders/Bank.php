<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The bank source used to fund the payment
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-bank.json
 */
class Bank implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AchDebit
     * ACH bank details required to fund the payment.
     */
    public $ach_debit;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->ach_debit) || Assert::notNull($this->ach_debit->account_number, "account_number in ach_debit must not be NULL within Bank $within");
        !isset($this->ach_debit) || Assert::notNull($this->ach_debit->routing_number, "routing_number in ach_debit must not be NULL within Bank $within");
        !isset($this->ach_debit) || Assert::notNull($this->ach_debit->account_holder_name, "account_holder_name in ach_debit must not be NULL within Bank $within");
        !isset($this->ach_debit) || Assert::isInstanceOf($this->ach_debit, AchDebit::class, "ach_debit in Bank must be instance of AchDebit $within");
        !isset($this->ach_debit) || $this->ach_debit->validate(Bank::class);
    }

    public function __construct()
    {
    }
}
