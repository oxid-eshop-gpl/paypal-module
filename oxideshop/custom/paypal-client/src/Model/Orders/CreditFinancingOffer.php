<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details about the payer-selected credit financing offer.
 */
class CreditFinancingOffer implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $issuer;

    /** @var Money */
    public $total_payment;

    /** @var Money */
    public $total_interest;

    /** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CreditFinancingOfferInstallmentDetails */
    public $installment_details;

    /** @var integer */
    public $term;
}
