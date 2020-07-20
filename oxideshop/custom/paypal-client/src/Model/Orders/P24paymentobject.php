<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * Information used to pay using P24(Przelewy24)
 */
class P24paymentobject
{
	/** @var string */
	public $payment_descriptor;

	/** @var string */
	public $method_id;

	/** @var string */
	public $method_description;
}
