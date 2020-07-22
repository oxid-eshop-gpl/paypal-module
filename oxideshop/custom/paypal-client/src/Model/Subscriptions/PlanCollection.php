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
     * @var array<Plan>
     * An array of plans.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 32767
     */
    public $plans;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->plans, "plans in PlanCollection must not be NULL $within");
         Assert::minCount($this->plans, 0, "plans in PlanCollection must have min. count of 0 $within");
         Assert::maxCount($this->plans, 32767, "plans in PlanCollection must have max. count of 32767 $within");
         Assert::isArray($this->plans, "plans in PlanCollection must be array $within");

                                if (isset($this->plans)){
                                    foreach ($this->plans as $item) {
                                        $item->validate(PlanCollection::class);
                                    }
                                }

        !isset($this->links) || Assert::isArray($this->links, "links in PlanCollection must be array $within");
    }

    public function __construct()
    {
    }
}
