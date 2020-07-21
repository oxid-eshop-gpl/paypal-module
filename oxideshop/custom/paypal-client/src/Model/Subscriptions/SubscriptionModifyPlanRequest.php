<?php

namespace OxidProfessionalServices\PayPal\Model\Subscriptions;

/**
 * The request to update the quantity of the product or service in a subscription. You can also use this method to switch the plan and update the `shipping_amount` and `shipping_address` values for the subscription. This type of update requires the buyer's consent.
 */
class SubscriptionModifyPlanRequest
{
	/** @var string */
	public $plan_id;

	/** @var string */
	public $quantity;
}
