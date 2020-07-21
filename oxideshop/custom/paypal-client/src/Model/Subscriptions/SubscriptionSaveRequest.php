<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The save subscription request details.
 */
class SubscriptionSaveRequest implements \JsonSerializable
{
    /** @var string */
    public $token_id;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
