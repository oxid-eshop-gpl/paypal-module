<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The save subscription request details.
 *
 * generated from: subscription_save_request.json
 */
class SubscriptionSaveRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $token_id;
}
