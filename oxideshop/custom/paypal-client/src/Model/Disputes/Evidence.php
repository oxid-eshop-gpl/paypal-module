<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant- or customer-submitted evidence document.
 *
 * generated from: response-evidence.json
 */
class Evidence implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $evidence_type;

    /**
     * @var EvidenceInfo
     * The evidence-related information.
     */
    public $evidence_info;

    /** @var array<Document> */
    public $documents;

    /** @var string */
    public $notes;

    /** @var string */
    public $source;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $date;

    /** @var string */
    public $item_id;
}
