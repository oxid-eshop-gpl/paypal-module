<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class PaymentCollection
{
	/** @var array */
	public $authorizations;

	/** @var array */
	public $captures;

	/** @var array */
	public $refunds;
}
