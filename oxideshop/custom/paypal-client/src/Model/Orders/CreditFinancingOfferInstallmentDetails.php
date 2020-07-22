<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payer-approved installment payment plan details.
 *
 * generated from: CreditFinancingOffer_installment_details
 */
class CreditFinancingOfferInstallmentDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $period;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $payment_due;
}
