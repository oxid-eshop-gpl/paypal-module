<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The list of subscriptions.
 *
 * generated from: subscription_collection.json
 */
class SubscriptionCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of subscriptions.
     *
     * @var Subscription[]
     * maxItems: 0
     * maxItems: 32767
     */
    public $subscriptions;

    /**
     * The total number of items.
     *
     * @var integer | null
     */
    public $total_items;

    /**
     * The total number of pages.
     *
     * @var integer | null
     */
    public $total_pages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     *
     * @var LinkDescription[] | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->subscriptions, "subscriptions in SubscriptionCollection must not be NULL $within");
        Assert::minCount(
            $this->subscriptions,
            0,
            "subscriptions in SubscriptionCollection must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->subscriptions,
            32767,
            "subscriptions in SubscriptionCollection must have max. count of 32767 $within"
        );
        Assert::isArray(
            $this->subscriptions,
            "subscriptions in SubscriptionCollection must be array $within"
        );

        if (isset($this->subscriptions)) {
            foreach ($this->subscriptions as $item) {
                $item->validate(SubscriptionCollection::class);
            }
        }

        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in SubscriptionCollection must be array $within"
        );

        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(SubscriptionCollection::class);
            }
        }
    }

    public function __construct()
    {
        $this->subscriptions = [];
    }
}
