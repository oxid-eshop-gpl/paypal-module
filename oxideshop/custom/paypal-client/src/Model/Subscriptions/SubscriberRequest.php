<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The subscriber request information .
 */
class SubscriberRequest extends \Payer
{
	/** @var ShippingDetail */
	public $shipping_address;

	/** @var PaymentSource */
	public $payment_source;
}
