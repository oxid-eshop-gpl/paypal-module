<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A customer- or merchant-posted message for the dispute.
 *
 * generated from: response-message.json
 */
class Message implements JsonSerializable
{
    use BaseModel;

    /** The customer posted the message. */
    const POSTED_BY_BUYER = 'BUYER';

    /** The merchant posted the message. */
    const POSTED_BY_SELLER = 'SELLER';

    /** The arbiter of the dispute posted the message. */
    const POSTED_BY_ARBITER = 'ARBITER';

    /**
     * @var string
     * Indicates whether the customer, merchant, or dispute arbiter posted the message.
     *
     * use one of constants defined in this class to set the value:
     * @see POSTED_BY_BUYER
     * @see POSTED_BY_SELLER
     * @see POSTED_BY_ARBITER
     * minLength: 1
     * maxLength: 255
     */
    public $posted_by;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $time_posted;

    /**
     * @var string
     * The message text.
     *
     * maxLength: 2000
     */
    public $content;
}
