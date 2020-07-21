<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Authorizes either a portion or the full amount of a saved order.
 */
class AuthorizationRequest
{
	/** @var string */
	public $order_id;

	/** @var PaymentSource */
	public $payment_source;

	/** @var AmountWithBreakdown */
	public $amount;

	/** @var Payee */
	public $payee;

	/** @var string */
	public $description;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $invoice_id;

	/** @var array */
	public $items;

	/** @var ShippingDetail */
	public $shipping;
}
