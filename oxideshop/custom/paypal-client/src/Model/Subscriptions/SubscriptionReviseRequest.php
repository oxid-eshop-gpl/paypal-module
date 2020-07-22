<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The request to update the quantity of the product or service in a subscription. You can also use this method
 * to switch the plan and update the `shipping_amount` and `shipping_address` values for the subscription. This
 * type of update requires the buyer's consent.
 *
 * generated from: subscription_revise_request.json
 */
class SubscriptionReviseRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The unique PayPal-generated ID for the plan.
     */
    public $plan_id;

    /**
     * @var string
     * The quantity of the product or service in the subscription.
     */
    public $quantity;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $effective_time;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_amount;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping_address;

    /**
     * @var CustomizedXUnsupportedNineEightNineFourApplicationContext
     * The application context, which customizes the payer experience during the subscription approval process with
     * PayPal.
     */
    public $application_context;
}
