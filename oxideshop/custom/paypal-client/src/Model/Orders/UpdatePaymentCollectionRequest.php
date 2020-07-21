<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized payments, captured payments.
 */
class UpdatePaymentCollectionRequest
{
	/** @var array */
	public $authorizations;

	/** @var array */
	public $captures;
}
