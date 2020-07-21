<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list of subscriptions.
 */
class SubscriptionCollection implements JsonSerializable
{
    use BaseModel;

    /** @var array<Subscription> */
    public $subscriptions;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array<array> */
    public $links;
}
