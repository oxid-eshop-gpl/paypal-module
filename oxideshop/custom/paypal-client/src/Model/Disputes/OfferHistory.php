<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The offer history.
 *
 * generated from: response-offer_history.json
 */
class OfferHistory implements JsonSerializable
{
    use BaseModel;

    /** The actor is the customer. */
    const ACTOR_BUYER = 'BUYER';

    /** The actor is the merchant. */
    const ACTOR_SELLER = 'SELLER';

    /** The merchant or customer proposed an offer. */
    const EVENT_TYPE_PROPOSED = 'PROPOSED';

    /** The merchant or customer accepted the offer. */
    const EVENT_TYPE_ACCEPTED = 'ACCEPTED';

    /** The merchant or customer rejected the offer. */
    const EVENT_TYPE_DENIED = 'DENIED';

    /** The merchant must refund the customer without any item replacement or return. This offer type is valid in the chargeback phase and occurs when a merchant is willing to refund the dispute amount without any further action from customer. Omit the <code>refund_amount</code> and <code>return_shipping_address</code> parameters from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    const OFFER_TYPE_REFUND = 'REFUND';

    /** The customer must return the item to the merchant and then merchant will refund the money. This offer type is valid in the chargeback phase and occurs when a merchant is willing to refund the dispute amount and requires the customer to return the item. Include the <code>return_shipping_address</code> parameter in but omit the <code>refund_amount</code> parameter from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    const OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';

    /** The merchant must do a refund and then send a replacement item to the customer. This offer type is valid in the inquiry phase when a merchant is willing to refund a specific amount and send the replacement item. Include the <code>offer_amount</code> parameter in the <a href="/docs/api/customer-disputes/v1/#disputes-actions_make-offer">make offer to resolve dispute</a> call. */
    const OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';

    /** The merchant must send a replacement item to the customer with no additional refunds. This offer type is valid in the inquiry phase when a merchant is willing to replace the item without any refund. Omit the <code>offer_amount</code> parameter from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_make-offer">make offer to resolve dispute</a> call. */
    const OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $offer_time;

    /**
     * @var string
     * The event-related actor.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTOR_BUYER
     * @see ACTOR_SELLER
     * minLength: 1
     * maxLength: 255
     */
    public $actor;

    /**
     * @var string
     * The type of the history event.
     *
     * use one of constants defined in this class to set the value:
     * @see EVENT_TYPE_PROPOSED
     * @see EVENT_TYPE_ACCEPTED
     * @see EVENT_TYPE_DENIED
     * minLength: 1
     * maxLength: 255
     */
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
     * minLength: 1
     * maxLength: 255
     */
    public $offer_type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $offer_amount;

    public function validate()
    {
        assert(!isset($this->offer_time) || strlen($this->offer_time) >= 20);
        assert(!isset($this->offer_time) || strlen($this->offer_time) <= 64);
        assert(!isset($this->actor) || strlen($this->actor) >= 1);
        assert(!isset($this->actor) || strlen($this->actor) <= 255);
        assert(!isset($this->event_type) || strlen($this->event_type) >= 1);
        assert(!isset($this->event_type) || strlen($this->event_type) <= 255);
        assert(!isset($this->offer_type) || strlen($this->offer_type) >= 1);
        assert(!isset($this->offer_type) || strlen($this->offer_type) <= 255);
        assert(isset($this->offer_amount));
    }
}
