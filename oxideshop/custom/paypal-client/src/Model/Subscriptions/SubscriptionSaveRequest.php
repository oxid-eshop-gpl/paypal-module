<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The save subscription request details.
 */
class SubscriptionSaveRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $token_id;
}
