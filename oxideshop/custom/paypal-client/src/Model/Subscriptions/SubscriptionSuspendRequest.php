<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The suspend subscription request details.
 *
 * generated from: subscription_suspend_request.json
 */
class SubscriptionSuspendRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The reason for suspenson of the subscription.
     *
     * minLength: 1
     * maxLength: 128
     */
    public $reason;

    public function validate()
    {
        assert(!isset($this->reason) || strlen($this->reason) >= 1);
        assert(!isset($this->reason) || strlen($this->reason) <= 128);
    }
}
