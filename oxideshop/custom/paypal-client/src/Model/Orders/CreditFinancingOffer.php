<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details about the payer-selected credit financing offer.
 */
class CreditFinancingOffer
{
	/** @var string */
	public $issuer;

	/** @var Money */
	public $total_payment;

	/** @var Money */
	public $total_interest;

	/** @var string */
	public $period;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\InstallmentDetails */
	public $InstallmentDetails;

	/** @var integer */
	public $term;
}
