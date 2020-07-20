<?php

namespace OxidProfessionalServices\PayPal\Api\Subscriptions;

/**
 * The create plan request details.
 */
class CreatePlanRequest
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

	/** @var boolean */
	public $quantity_supported;
}
