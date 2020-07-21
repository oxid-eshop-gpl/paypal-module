<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

class AuthorizationRequest
{
	/** @var string */
	public $order_id;

	/** @var string */
	public $description;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $invoice_id;

	/** @var array */
	public $items;
}
