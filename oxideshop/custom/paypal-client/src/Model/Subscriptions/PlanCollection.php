<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The list of plans with details.
 */
class PlanCollection implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $plans;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array */
    public $links;
}
