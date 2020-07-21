<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The transaction details.
 */
class Transaction extends CaptureStatus implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /**
     * @var AmountWithBreakdown
     * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
     */
    public $amount_with_breakdown;

    /**
     * @var Name
     * The name of the party.
     */
    public $payer_name;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     */
    public $payer_email;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $time;
}
