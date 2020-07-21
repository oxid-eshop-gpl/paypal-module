<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class OrderRequest
{
	/** @var Payer */
	public $payer;

	/** @var array */
	public $purchase_units;

	/** @var PaymentSource */
	public $payment_source;
}
