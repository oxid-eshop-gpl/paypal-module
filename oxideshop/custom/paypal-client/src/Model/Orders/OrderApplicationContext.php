<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Customizes the payer experience during the approval process for the payment with PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code> and <code>shipping_preference</code> during partner account setup, which overrides the request values.</blockquote>
 */
class OrderApplicationContext
{
	/** @var string */
	public $brand_name;

	/** @var string */
	public $locale;

	/** @var string */
	public $landing_page;

	/** @var string */
	public $shipping_preference;

	/** @var string */
	public $user_action;

	/** @var PaymentMethod */
	public $payment_method;

	/** @var string */
	public $return_url;

	/** @var string */
	public $cancel_url;

	/** @var string */
	public $payment_token;

	/** @var ClientConfiguration */
	public $client_configuration;

	/** @var boolean */
	public $vault;

	/** @var PaymentSource */
	public $preferred_payment_source;
}
