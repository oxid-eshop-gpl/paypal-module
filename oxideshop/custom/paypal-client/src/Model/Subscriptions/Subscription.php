<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subscription details.
 */
class Subscription extends SubscriptionStatus implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $plan_id;

    /** @var string */
    public $start_time;

    /** @var string */
    public $quantity;

    /** @var Money */
    public $shipping_amount;

    /** @var Payee */
    public $payee;

    /** @var Subscriber */
    public $subscriber;

    /** @var SubscriptionBillingInfo */
    public $billing_info;

    /** @var boolean */
    public $auto_renewal;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    /** @var string */
    public $preferred_currency_conversion;

    /** @var FundingInstrumentResponse */
    public $preferred_funding_source;

    /** @var array */
    public $links;
}
