<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant- or customer-submitted supporting information.
 *
 * generated from: response-supporting_info.json
 */
class SupportingInfo implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $notes;

    /** @var array<Document> */
    public $documents;

    /** @var string */
    public $source;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $provided_time;
}
