<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class ApplicationContext
{
	/** @var string */
	public $brand_name;

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
