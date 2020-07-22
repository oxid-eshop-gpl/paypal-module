<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * An array of disputes. Includes links that enable you to navigate through the response.
 *
 * generated from: response-dispute_search.json
 */
class DisputeSearch implements JsonSerializable
{
    use BaseModel;

    /** @var array<DisputeInfo> */
    public $items;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array<array> */
    public $links;
}
