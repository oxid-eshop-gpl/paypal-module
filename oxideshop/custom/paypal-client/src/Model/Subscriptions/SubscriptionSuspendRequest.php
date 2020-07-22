<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reason) || Assert::minLength($this->reason, 1, "reason in SubscriptionSuspendRequest must have minlength of 1 $within");
        !isset($this->reason) || Assert::maxLength($this->reason, 128, "reason in SubscriptionSuspendRequest must have maxlength of 128 $within");
    }

    public function __construct()
    {
    }
}
