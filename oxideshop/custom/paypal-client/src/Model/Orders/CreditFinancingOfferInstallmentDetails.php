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

    /** Payments are monthly. */
    const PERIOD_MONTHLY = 'MONTHLY';

    /**
     * @var string
     * The frequency with which the payer has agreed to make the payment.
     *
     * use one of constants defined in this class to set the value:
     * @see PERIOD_MONTHLY
     */
    public $period;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $payment_due;
}
