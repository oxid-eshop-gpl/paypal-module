<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The save subscription request details.
 *
 * generated from: subscription_save_request.json
 */
class SubscriptionSaveRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The identifier of session for which subscription needs to be saved.
     *
     * minLength: 3
     * maxLength: 50
     */
    public $token_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->token_id) || Assert::minLength($this->token_id, 3, "token_id in SubscriptionSaveRequest must have minlength of 3 $within");
        !isset($this->token_id) || Assert::maxLength($this->token_id, 50, "token_id in SubscriptionSaveRequest must have maxlength of 50 $within");
    }

    public function __construct()
    {
    }
}
