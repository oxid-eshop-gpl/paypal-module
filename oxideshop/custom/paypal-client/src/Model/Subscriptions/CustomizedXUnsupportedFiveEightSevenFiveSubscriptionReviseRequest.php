<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The request to update the quantity of the product or service in a subscription. You can also use this method to switch the plan and update the `shipping_amount` and `shipping_address` values for the subscription. This type of update requires the buyer's consent.
 */
class CustomizedXUnsupportedFiveEightSevenFiveSubscriptionReviseRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $plan_id;

    /** @var string */
    public $quantity;

    /** @var string */
    public $effective_time;

    /** @var Money */
    public $shipping_amount;

    /** @var ShippingDetail */
    public $shipping_address;
}
