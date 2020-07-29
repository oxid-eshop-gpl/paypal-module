<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An array of disputes. Includes links that enable you to navigate through the response.
 *
 * generated from: response-dispute_search.json
 */
class DisputeSearch implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of disputes that match the filter criteria. Sorted in latest to earliest creation time order.
     *
     * @var DisputeInfo[] | null
     */
    public $items;

    /**
     * The total number of items. If the request specifies `total_required=true`, appears in the response.
     *
     * @var integer | null
     */
    public $total_items;

    /**
     * The total number of pages. If the request specifies `total_required=true`, appears in the response.
     *
     * @var integer | null
     */
    public $total_pages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     *
     * @var LinkDescription[] | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->items) || Assert::isArray(
            $this->items,
            "items in DisputeSearch must be array $within"
        );

        if (isset($this->items)) {
            foreach ($this->items as $item) {
                $item->validate(DisputeSearch::class);
            }
        }

        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in DisputeSearch must be array $within"
        );

        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(DisputeSearch::class);
            }
        }
    }

    public function __construct()
    {
    }
}
