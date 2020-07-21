<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The pricing tier details.
 */
class PricingTier implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $starting_quantity;

    /** @var string */
    public $ending_quantity;

    /** @var Money */
    public $amount;
}
