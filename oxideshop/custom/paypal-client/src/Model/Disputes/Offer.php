<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant-proposed offer for a dispute.
 */
class Offer implements \JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $buyer_requested_amount;

    /** @var Money */
    public $seller_offered_amount;

    /** @var string */
    public $offer_type;

    /** @var array */
    public $history;
}
