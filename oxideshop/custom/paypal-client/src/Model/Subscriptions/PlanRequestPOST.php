<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The create plan request details.
 */
class PlanRequestPOST
{
	/** @var string */
	public $product_id;

	/** @var string */
	public $name;

	/** @var string */
	public $status;

	/** @var string */
	public $description;

	/** @var string */
	public $usage_type;

	/** @var array */
	public $billing_cycles;

	/** @var PaymentPreferences */
	public $payment_preferences;

	/** @var Taxes */
	public $taxes;

	/** @var boolean */
	public $quantity_supported;
}
