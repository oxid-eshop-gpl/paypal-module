<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Customizes the payer experience during the approval process for the payment with PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code> and <code>shipping_preference</code> during partner account setup, which overrides the request values.</blockquote>
 */
class OrderValidateApplicationContext
{
	/** @var boolean */
	public $vault;
}
