<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the failed payment of the subscription.
 */
class FailedPaymentDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $amount;

    /** @var string */
    public $time;

    /** @var string */
    public $reason_code;

    /** @var string */
    public $next_payment_retry_time;
}
