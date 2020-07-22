<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subscription status details.
 *
 * generated from: subscription_status.json
 */
class SubscriptionStatus implements JsonSerializable
{
    use BaseModel;

    /** The subscription is created but not yet approved by the buyer. */
    const STATUS_APPROVAL_PENDING = 'APPROVAL_PENDING';

    /** The buyer has approved the subscription. */
    const STATUS_APPROVED = 'APPROVED';

    /** The subscription is active. */
    const STATUS_ACTIVE = 'ACTIVE';

    /** The subscription is suspended. */
    const STATUS_SUSPENDED = 'SUSPENDED';

    /** The subscription is cancelled. */
    const STATUS_CANCELLED = 'CANCELLED';

    /** The subscription is expired. */
    const STATUS_EXPIRED = 'EXPIRED';

    /** The subscription status bas been updated by the system. */
    const STATUS_CHANGED_BY_SYSTEM = 'SYSTEM';

    /** The subscription status bas been updated by the buyer. */
    const STATUS_CHANGED_BY_BUYER = 'BUYER';

    /** The subscription status bas been updated by the merchant. */
    const STATUS_CHANGED_BY_MERCHANT = 'MERCHANT';

    /** The subscription status bas been updated by the facilitator. Facilitators ca be a third party or channel partner that integrates with PayPal. */
    const STATUS_CHANGED_BY_FACILITATOR = 'FACILITATOR';

    /**
     * @var string
     * The status of the subscription.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_APPROVAL_PENDING
     * @see STATUS_APPROVED
     * @see STATUS_ACTIVE
     * @see STATUS_SUSPENDED
     * @see STATUS_CANCELLED
     * @see STATUS_EXPIRED
     */
    public $status;

    /**
     * @var string
     * The reason or notes for the status of the subscription.
     */
    public $status_change_note;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $status_update_time;

    /**
     * @var string
     * The last actor that updated the subscription.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CHANGED_BY_SYSTEM
     * @see STATUS_CHANGED_BY_BUYER
     * @see STATUS_CHANGED_BY_MERCHANT
     * @see STATUS_CHANGED_BY_FACILITATOR
     */
    public $status_changed_by;
}
