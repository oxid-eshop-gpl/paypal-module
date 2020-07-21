<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The merchant-proposed offer for a dispute.
 */
class Offer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $buyer_requested_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $seller_offered_amount;

    /**
     * @var string
     * The merchant-proposed offer type for the dispute.
     */
    public $offer_type;

    /** @var array<OfferHistory> */
    public $history;
}
