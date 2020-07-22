<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
