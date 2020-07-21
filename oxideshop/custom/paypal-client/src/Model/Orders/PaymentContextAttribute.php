<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * Payment Context Attribute. Typically used as a reference for a payment. Eg: CART_ID, PAY_ID.
 */
class PaymentContextAttribute
{
	/** @var string */
	public $name;

	/** @var string */
	public $value;
}
