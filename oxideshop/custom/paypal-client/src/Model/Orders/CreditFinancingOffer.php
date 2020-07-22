<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details about the payer-selected credit financing offer.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-credit_financing_offer.json
 */
class CreditFinancingOffer implements JsonSerializable
{
    use BaseModel;

    /** Issued by PayPal. */
    const ISSUER_PAYPAL = 'PAYPAL';

    /**
     * @var string
     * The issuer of the credit financing offer.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUER_PAYPAL
     */
    public $issuer;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $total_payment;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $total_interest;

    /**
     * @var CreditFinancingOfferInstallmentDetails
     * The payer-approved installment payment plan details.
     */
    public $installment_details;

    /**
     * @var integer
     * The payer-selected financing term, in months.
     */
    public $term;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->total_payment) || Assert::notNull($this->total_payment->currency_code, "currency_code in total_payment must not be NULL within CreditFinancingOffer $within");
        !isset($this->total_payment) || Assert::notNull($this->total_payment->value, "value in total_payment must not be NULL within CreditFinancingOffer $within");
        !isset($this->total_payment) || Assert::isInstanceOf($this->total_payment, Money::class, "total_payment in CreditFinancingOffer must be instance of Money $within");
        !isset($this->total_payment) || $this->total_payment->validate(CreditFinancingOffer::class);
        !isset($this->total_interest) || Assert::notNull($this->total_interest->currency_code, "currency_code in total_interest must not be NULL within CreditFinancingOffer $within");
        !isset($this->total_interest) || Assert::notNull($this->total_interest->value, "value in total_interest must not be NULL within CreditFinancingOffer $within");
        !isset($this->total_interest) || Assert::isInstanceOf($this->total_interest, Money::class, "total_interest in CreditFinancingOffer must be instance of Money $within");
        !isset($this->total_interest) || $this->total_interest->validate(CreditFinancingOffer::class);
        !isset($this->installment_details) || Assert::isInstanceOf($this->installment_details, CreditFinancingOfferInstallmentDetails::class, "installment_details in CreditFinancingOffer must be instance of CreditFinancingOfferInstallmentDetails $within");
        !isset($this->installment_details) || $this->installment_details->validate(CreditFinancingOffer::class);
    }

    public function __construct()
    {
    }
}
