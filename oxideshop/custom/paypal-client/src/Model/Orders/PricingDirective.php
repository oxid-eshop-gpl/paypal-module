<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Pricing directive for transaction indication the source and type of pricing.
 */
class PricingDirective implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $participant_type;

    /** @var string */
    public $account_number;

    /** @var string */
    public $type;
}
