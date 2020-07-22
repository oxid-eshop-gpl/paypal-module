<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
