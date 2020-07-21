<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The activate subscription request details.
 */
class SubscriptionActivateRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
