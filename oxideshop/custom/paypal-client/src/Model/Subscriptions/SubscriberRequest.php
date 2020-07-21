<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The subscriber request information .
 */
class SubscriberRequest extends \Payer implements \JsonSerializable
{
	/** @var ShippingDetail */
	public $shipping_address;

	/** @var PaymentSource */
	public $payment_source;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
