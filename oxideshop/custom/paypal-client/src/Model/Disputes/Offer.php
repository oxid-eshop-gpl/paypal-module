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

    const OFFER_TYPE_REFUND = 'REFUND';
    const OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';
    const OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';
    const OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

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
     *
     * use one of constants defined in this class to set the value:
     * @see OFFER_TYPE_REFUND
     * @see OFFER_TYPE_REFUND_WITH_RETURN
     * @see OFFER_TYPE_REFUND_WITH_REPLACEMENT
     * @see OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND
     */
    public $offer_type;

    /** @var array<OfferHistory> */
    public $history;
}
