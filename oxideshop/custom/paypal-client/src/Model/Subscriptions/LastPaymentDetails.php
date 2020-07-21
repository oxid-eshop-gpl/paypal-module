<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the last payment of the subscription.
 */
class LastPaymentDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $amount;

    /** @var string */
    public $time;
}
