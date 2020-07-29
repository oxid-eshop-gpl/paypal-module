<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The bank source used to fund the payment
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-bank.json
 */
class Bank implements JsonSerializable
{
    use BaseModel;

    /**
     * ACH bank details required to fund the payment.
     *
     * @var AchDebit | null
     */
    public $ach_debit;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->ach_debit) || Assert::isInstanceOf(
            $this->ach_debit,
            AchDebit::class,
            "ach_debit in Bank must be instance of AchDebit $within"
        );
        !isset($this->ach_debit) ||  $this->ach_debit->validate(Bank::class);
    }

    public function __construct()
    {
    }
}
