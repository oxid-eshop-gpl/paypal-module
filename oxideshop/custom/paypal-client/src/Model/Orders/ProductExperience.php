<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The product experiences that a user completes on a PayPal transaction.
 */
class ProductExperience
{
	public $user_experience_flow;
	public $entry_point;
	public $payment_method;
	public $channel;
	public $product_flow;
}
