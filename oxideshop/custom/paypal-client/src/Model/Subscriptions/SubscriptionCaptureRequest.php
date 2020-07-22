<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The charge amount from the subscriber.
 *
 * generated from: subscription_capture_request.json
 */
class SubscriptionCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $note;

    /** @var string */
    public $capture_type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;
}
