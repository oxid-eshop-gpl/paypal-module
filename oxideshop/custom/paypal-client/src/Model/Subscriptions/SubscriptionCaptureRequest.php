<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The charge amount from the subscriber.
 */
class SubscriptionCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $note;

    /** @var string */
    public $capture_type;

    /** @var Money */
    public $amount;
}
