<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The return details for the product.
 *
 * generated from: response-return_details.json
 */
class ReturnDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $return_time;

    /** @var string */
    public $mode;

    /** @var boolean */
    public $receipt;

    /** @var string */
    public $return_confirmation_number;

    /** @var boolean */
    public $returned;
}
