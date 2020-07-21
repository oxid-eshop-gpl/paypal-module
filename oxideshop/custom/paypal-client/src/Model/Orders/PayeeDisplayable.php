<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout, transactions, email receipts, and transaction history.
 */
class PayeeDisplayable
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Email */
	public $business_email;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Phone */
	public $business_phone;

	/** @var string */
	public $brand_name;
}
