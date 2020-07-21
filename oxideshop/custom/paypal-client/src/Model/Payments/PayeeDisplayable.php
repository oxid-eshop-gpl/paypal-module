<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout, transactions, email receipts, and transaction history.
 */
class PayeeDisplayable
{
	/** @var string */
	public $business_email;

	/** @var Phone */
	public $business_phone;

	/** @var string */
	public $brand_name;
}
