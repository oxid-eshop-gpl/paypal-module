<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list of subscriptions.
 */
class SubscriptionCollection implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $subscriptions;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array */
    public $links;
}
