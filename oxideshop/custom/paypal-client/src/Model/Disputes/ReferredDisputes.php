<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * An array of disputes. Includes links that enable you to navigate through the response.
 *
 * generated from: referred-referred_disputes.json
 */
class ReferredDisputes implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<ReferredDisputeSummary>
     * An array of disputes that match the filter criteria. Sorted in latest to earliest creation time order.
     */
    public $items;

    /**
     * @var integer
     * The total number of items/Disputes available for the given search criteria.
     */
    public $total_items;

    /**
     * @var integer
     * The total number of pages in the response.
     */
    public $total_pages;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     */
    public $links;

    public function validate()
    {
    }
}
