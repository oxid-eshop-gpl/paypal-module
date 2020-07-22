<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_due) || Assert::notNull($this->payment_due->currency_code, "currency_code in payment_due must not be NULL within CreditFinancingOfferInstallmentDetails $within");
        !isset($this->payment_due) || Assert::notNull($this->payment_due->value, "value in payment_due must not be NULL within CreditFinancingOfferInstallmentDetails $within");
        !isset($this->payment_due) || Assert::isInstanceOf($this->payment_due, Money::class, "payment_due in CreditFinancingOfferInstallmentDetails must be instance of Money $within");
        !isset($this->payment_due) || $this->payment_due->validate(CreditFinancingOfferInstallmentDetails::class);
    }

    public function __construct()
    {
    }
}
