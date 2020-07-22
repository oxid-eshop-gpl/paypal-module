<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
    }
}
