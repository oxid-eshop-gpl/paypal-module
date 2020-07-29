<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The list of plans with details.
 *
 * generated from: plan_collection.json
 */
class PlanCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of plans.
     *
     * @var Plan[]
     * maxItems: 0
     * maxItems: 32767
     */
    public $plans;

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
        Assert::notNull($this->plans, "plans in PlanCollection must not be NULL $within");
        Assert::minCount(
            $this->plans,
            0,
            "plans in PlanCollection must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->plans,
            32767,
            "plans in PlanCollection must have max. count of 32767 $within"
        );
        Assert::isArray(
            $this->plans,
            "plans in PlanCollection must be array $within"
        );

        if (isset($this->plans)) {
            foreach ($this->plans as $item) {
                $item->validate(PlanCollection::class);
            }
        }

        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in PlanCollection must be array $within"
        );

        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(PlanCollection::class);
            }
        }
    }

    public function __construct()
    {
        $this->plans = [];
    }
}
