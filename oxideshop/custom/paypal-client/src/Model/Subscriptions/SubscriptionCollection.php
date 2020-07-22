<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list of subscriptions.
 *
 * generated from: subscription_collection.json
 */
class SubscriptionCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<Subscription>
     * An array of subscriptions.
     */
    public $subscriptions;

    /**
     * @var integer
     * The total number of items.
     */
    public $total_items;

    /**
     * @var integer
     * The total number of pages.
     */
    public $total_pages;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;

    public function validate()
    {
    }
}
