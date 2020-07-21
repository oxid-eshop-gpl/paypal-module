<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The offer history.
 */
class OfferHistory implements JsonSerializable
{
    use BaseModel;

    const OFFER_TYPE_REFUND = 'REFUND';
    const OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';
    const OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';
    const OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $offer_time;

    /** @var string */
    public $actor;

    /** @var string */
    public $event_type;

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

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $offer_amount;
}
