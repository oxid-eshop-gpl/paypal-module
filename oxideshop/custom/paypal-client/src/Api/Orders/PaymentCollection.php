<?php

namespace OxidProfessionalServices\PayPal\Api\Orders;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized payments, captured payments, and refunds.
 */
class PaymentCollection
{
	/** @var array */
	public $authorizations;

	/** @var array */
	public $captures;

	/** @var array */
	public $refunds;
}
