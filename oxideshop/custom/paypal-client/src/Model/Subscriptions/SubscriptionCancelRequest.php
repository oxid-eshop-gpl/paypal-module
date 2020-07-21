<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The cancel subscription request details.
 */
class SubscriptionCancelRequest implements \JsonSerializable
{
    /** @var string */
    public $reason;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
