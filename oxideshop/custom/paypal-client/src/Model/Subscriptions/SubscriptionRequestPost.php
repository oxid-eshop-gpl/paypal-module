<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The create subscription request details.
 */
class SubscriptionRequestPost implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $plan_id;

    /** @var string */
    public $start_time;

    /** @var string */
    public $quantity;

    /** @var Money */
    public $shipping_amount;

    /** @var SubscriberRequest */
    public $subscriber;

    /** @var boolean */
    public $auto_renewal;

    /** @var ApplicationContext */
    public $application_context;
}
