<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The subscription details.
 */
class Subscription extends \SubscriptionStatus implements \JsonSerializable
{
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

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
