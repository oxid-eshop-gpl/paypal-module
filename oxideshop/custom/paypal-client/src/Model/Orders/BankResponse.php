<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The bank source used to fund the payment
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-bank_response.json
 */
class BankResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AchDebitResponse
     * ACH bank details response object
     */
    public $ach_debit;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->ach_debit) || Assert::isInstanceOf($this->ach_debit, AchDebitResponse::class, "ach_debit in BankResponse must be instance of AchDebitResponse $within");
        !isset($this->ach_debit) || $this->ach_debit->validate(BankResponse::class);
    }

    public function __construct()
    {
    }
}
