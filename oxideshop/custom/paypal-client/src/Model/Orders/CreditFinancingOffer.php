<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details about the payer-selected credit financing offer.
 */
class CreditFinancingOffer
{
	/** @var string */
	public $issuer;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $total_payment;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $total_interest;

	/** @var object */
	public $installment_details;

	/** @var integer */
	public $term;
}
