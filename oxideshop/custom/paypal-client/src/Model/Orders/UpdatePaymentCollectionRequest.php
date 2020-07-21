<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized payments, captured payments.
 */
class UpdatePaymentCollectionRequest implements \JsonSerializable
{
	/** @var array */
	public $authorizations;

	/** @var array */
	public $captures;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
