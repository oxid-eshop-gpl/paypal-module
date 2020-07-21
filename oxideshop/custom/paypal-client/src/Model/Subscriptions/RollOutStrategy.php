<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The roll-out strategy for a pricing scheme update. After the pricing update, all new subscriptions are based on this pricing scheme and the values in this object determine the behavior for the existing subscriptions.
 */
class RollOutStrategy implements \JsonSerializable
{
    /** @var string */
    public $effective_time;

    /** @var string */
    public $process_change_from;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
