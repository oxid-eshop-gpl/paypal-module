<?php

namespace OxidProfessionalServices\PayPal\Api\Orders;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized payments, captured payments.
 */
class UpdatePaymentCollection
{
	/** @var array */
	public $authorizations;

	/** @var array */
	public $captures;
}
