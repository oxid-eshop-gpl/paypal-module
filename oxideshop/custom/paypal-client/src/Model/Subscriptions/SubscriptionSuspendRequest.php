<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The suspend subscription request details.
 */
class SubscriptionSuspendRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
