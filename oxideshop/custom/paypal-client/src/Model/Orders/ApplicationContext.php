<?php

namespace OxidProfessionalServices\PayPal\Model\Orders;

/**
 * Customizes the payer experience during the approval process for the payment with PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code> and <code>shipping_preference</code> during partner account setup, which overrides the request values.</blockquote>
 */
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

	/** @var string */
	public $return_url;

	/** @var string */
	public $cancel_url;

	/** @var string */
	public $payment_token;

	/** @var boolean */
	public $vault;
}
