<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The activate subscription request details.
 *
 * generated from: subscription_activate_request.json
 */
class SubscriptionActivateRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
