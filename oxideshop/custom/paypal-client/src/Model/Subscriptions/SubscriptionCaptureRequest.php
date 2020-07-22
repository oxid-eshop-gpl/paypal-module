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

    /** The outstanding balance that the subscriber must clear. */
    const CAPTURE_TYPE_OUTSTANDING_BALANCE = 'OUTSTANDING_BALANCE';

    /**
     * @var string
     * The reason or note for the subscription charge.
     */
    public $note;

    /**
     * @var string
     * The type of capture.
     *
     * use one of constants defined in this class to set the value:
     * @see CAPTURE_TYPE_OUTSTANDING_BALANCE
     */
    public $capture_type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;
}
