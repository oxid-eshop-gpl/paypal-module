<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The bank source used to fund the payment
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-bank.json
 */
class Bank implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AchDebit
     * ACH bank details required to fund the payment.
     */
    public $ach_debit;
}
