<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The cancel subscription request details.
 *
 * generated from: subscription_cancel_request.json
 */
class SubscriptionCancelRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The reason for the cancellation of a subscription.
     *
     * minLength: 1
     * maxLength: 128
     */
    public $reason;
}
