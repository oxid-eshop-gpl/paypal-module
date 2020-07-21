<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payer-approved installment payment plan details.
 */
class CreditFinancingOfferInstallmentDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $period;

    /** @var Money */
    public $payment_due;
}
