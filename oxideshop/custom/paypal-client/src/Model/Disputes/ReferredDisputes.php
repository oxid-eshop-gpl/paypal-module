<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An array of disputes. Includes links that enable you to navigate through the response.
 *
 * generated from: referred-referred_disputes.json
 */
class ReferredDisputes implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ReferredDisputeSummary[]
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
     * @var LinkDescription[]
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->items) || Assert::isArray($this->items, "items in ReferredDisputes must be array $within");

                                if (isset($this->items)){
                                    foreach ($this->items as $item) {
                                        $item->validate(ReferredDisputes::class);
                                    }
                                }

        !isset($this->links) || Assert::isArray($this->links, "links in ReferredDisputes must be array $within");

                                if (isset($this->links)){
                                    foreach ($this->links as $item) {
                                        $item->validate(ReferredDisputes::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
