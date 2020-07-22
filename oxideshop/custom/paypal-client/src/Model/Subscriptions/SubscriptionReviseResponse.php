<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The response to a request to update the quantity of the product or service in a subscription. You can also use
 * this method to switch the plan and update the `shipping_amount` and `shipping_address` values for the
 * subscription. This type of update requires the buyer's consent.
 *
 * generated from: subscription_revise_response.json
 */
class SubscriptionReviseResponse extends CustomizedXUnsupportedFiveEightSevenFiveSubscriptionReviseRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;
}