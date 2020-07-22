<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The history of the dispute.
 *
 * generated from: response-history.json
 */
class History implements JsonSerializable
{
    use BaseModel;

    /** The actor is the customer. */
    const ACTOR_BUYER = 'BUYER';

    /** The actor is the merchant. */
    const ACTOR_SELLER = 'SELLER';

    /** The actor is PayPal. */
    const ACTOR_PAYPAL = 'PAYPAL';

    /** The dispute was created in PayPal system. */
    const EVENT_TYPE_CREATED = 'CREATED';

    /** The customer opened the dispute with PayPal. */
    const EVENT_TYPE_OPEN = 'OPEN';

    /** The dispute moved to waiting for customer's response. */
    const EVENT_TYPE_WAITING_FOR_BUYER_RESPONSE = 'WAITING_FOR_BUYER_RESPONSE';

    /** The dispute moved to waiting for merchant's response. */
    const EVENT_TYPE_WAITING_FOR_SELLER_RESPONSE = 'WAITING_FOR_SELLER_RESPONSE';

    /** The dispute moved to a state where it is being reviewed by PayPal. */
    const EVENT_TYPE_UNDER_REVIEW = 'UNDER_REVIEW';

    /** The dispute was resolved. */
    const EVENT_TYPE_RESOLVED = 'RESOLVED';

    /** The dispute status moved to the <code>OTHER</code> status. */
    const EVENT_TYPE_OTHER = 'OTHER';

    /** The customer was notified about dispute through email. */
    const EVENT_TYPE_EMAIL_SENT_TO_BUYER = 'EMAIL_SENT_TO_BUYER';

    /** The merchant was notified about dispute through email. */
    const EVENT_TYPE_EMAIL_SENT_TO_SELLER = 'EMAIL_SENT_TO_SELLER';

    /** The customer provided an evidence document for the dispute. */
    const EVENT_TYPE_EVIDENCE_PROVIDED_BUYER = 'EVIDENCE_PROVIDED_BUYER';

    /** The merchant provided an evidence document for the dispute. */
    const EVENT_TYPE_EVIDENCE_PROVIDED_SELLER = 'EVIDENCE_PROVIDED_SELLER';

    /** The customer appealed the dispute outcome. */
    const EVENT_TYPE_APPEALED_BUYER = 'APPEALED_BUYER';

    /** The merchant appealed the dispute outcome. */
    const EVENT_TYPE_APPEALED_SELLER = 'APPEALED_SELLER';

    /** The customer changed the reason for the dispute. */
    const EVENT_TYPE_REASON_CHANGED = 'REASON_CHANGED';

    /** The dispute was escalated for PayPal's review. */
    const EVENT_TYPE_ESCALATED = 'ESCALATED';

    /** The merchant accepted the claim and refunded the customer. */
    const EVENT_TYPE_ACCEPTED_CLAIM = 'ACCEPTED_CLAIM';

    /** The customer cancelled the dispute. */
    const EVENT_TYPE_CANCELLED = 'CANCELLED';

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $date;

    /**
     * @var string
     * The event-related actor.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTOR_BUYER
     * @see ACTOR_SELLER
     * @see ACTOR_PAYPAL
     * minLength: 1
     * maxLength: 255
     */
    public $actor;

    /**
     * @var string
     * The type of the history event.
     *
     * use one of constants defined in this class to set the value:
     * @see EVENT_TYPE_CREATED
     * @see EVENT_TYPE_OPEN
     * @see EVENT_TYPE_WAITING_FOR_BUYER_RESPONSE
     * @see EVENT_TYPE_WAITING_FOR_SELLER_RESPONSE
     * @see EVENT_TYPE_UNDER_REVIEW
     * @see EVENT_TYPE_RESOLVED
     * @see EVENT_TYPE_OTHER
     * @see EVENT_TYPE_EMAIL_SENT_TO_BUYER
     * @see EVENT_TYPE_EMAIL_SENT_TO_SELLER
     * @see EVENT_TYPE_EVIDENCE_PROVIDED_BUYER
     * @see EVENT_TYPE_EVIDENCE_PROVIDED_SELLER
     * @see EVENT_TYPE_APPEALED_BUYER
     * @see EVENT_TYPE_APPEALED_SELLER
     * @see EVENT_TYPE_REASON_CHANGED
     * @see EVENT_TYPE_ESCALATED
     * @see EVENT_TYPE_ACCEPTED_CLAIM
     * @see EVENT_TYPE_CANCELLED
     * minLength: 1
     * maxLength: 255
     */
    public $event_type;
}
