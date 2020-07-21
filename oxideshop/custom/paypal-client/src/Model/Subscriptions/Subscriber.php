<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The subscriber response information.
 */
class Subscriber extends \Payer
{
	/** @var ShippingDetail */
	public $shipping_address;

	/** @var PaymentSourceResponse */
	public $payment_source;
}
