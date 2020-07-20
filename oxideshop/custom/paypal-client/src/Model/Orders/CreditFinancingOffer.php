<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details about the payer-selected credit financing offer.
 */
class CreditFinancingOffer
{
	public $issuer;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $total_payment;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $total_interest;
	public $installment_details;
	public $term;
}
