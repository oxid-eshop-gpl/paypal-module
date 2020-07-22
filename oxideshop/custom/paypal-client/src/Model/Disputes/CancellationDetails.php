<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The cancellation details.
 *
 * generated from: response-cancellation_details.json
 */
class CancellationDetails implements JsonSerializable
{
    use BaseModel;

    /** Cancelled the billing agreement. */
    const CANCELLATION_MODE_CANCELLED_PAYPAL_BILLING_AGREEMENT = 'CANCELLED_PAYPAL_BILLING_AGREEMENT';

    /** The item was cancelled on the merchant's website. */
    const CANCELLATION_MODE_WEBSITE = 'WEBSITE';

    /** The item was cancelled through either phone or fax. */
    const CANCELLATION_MODE_PHONE = 'PHONE';

    /** The item was cancelled through either email or text message. */
    const CANCELLATION_MODE_EMAIL = 'EMAIL';

    /** The item was cancelled via written communication. */
    const CANCELLATION_MODE_WRITTEN = 'WRITTEN';

    /** The item was cancelled in person. */
    const CANCELLATION_MODE_IN_PERSON = 'IN_PERSON';

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $cancellation_date;

    /**
     * @var string
     * The cancellation number.
     */
    public $cancellation_number;

    /**
     * @var boolean
     * Indicates whether the dispute was canceled.
     */
    public $cancelled;

    /**
     * @var string
     * Indicates the mode used for order cancellation.
     *
     * use one of constants defined in this class to set the value:
     * @see CANCELLATION_MODE_CANCELLED_PAYPAL_BILLING_AGREEMENT
     * @see CANCELLATION_MODE_WEBSITE
     * @see CANCELLATION_MODE_PHONE
     * @see CANCELLATION_MODE_EMAIL
     * @see CANCELLATION_MODE_WRITTEN
     * @see CANCELLATION_MODE_IN_PERSON
     * minLength: 1
     * maxLength: 255
     */
    public $cancellation_mode;

    public function validate()
    {
        assert(!isset($this->cancellation_date) || strlen($this->cancellation_date) >= 20);
        assert(!isset($this->cancellation_date) || strlen($this->cancellation_date) <= 64);
        assert(!isset($this->cancellation_mode) || strlen($this->cancellation_mode) >= 1);
        assert(!isset($this->cancellation_mode) || strlen($this->cancellation_mode) <= 255);
    }
}
