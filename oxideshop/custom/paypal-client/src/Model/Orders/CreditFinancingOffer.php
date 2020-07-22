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

    /** @var string */
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

    /** @var CreditFinancingOfferInstallmentDetails */
    public $installment_details;

    /** @var integer */
    public $term;
}
