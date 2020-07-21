<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The list of subscriptions.
 */
class SubscriptionCollection implements \JsonSerializable
{
    /** @var array */
    public $subscriptions;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
