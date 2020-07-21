<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The cancel subscription request details.
 */
class SubscriptionCancelRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
