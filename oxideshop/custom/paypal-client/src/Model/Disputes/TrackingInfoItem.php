<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tracking information item.
 *
 * generated from: referred-tracking_info_item.json
 */
class TrackingInfoItem implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $carrier_name;

    /** @var string */
    public $tracking_url;

    /** @var string */
    public $tracking_number;

    /** @var string */
    public $tracking_status;

    /** @var string */
    public $note;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $posted_time;
}
