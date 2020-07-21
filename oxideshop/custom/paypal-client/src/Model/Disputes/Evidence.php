<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant- or customer-submitted evidence document.
 */
class Evidence implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $evidence_type;

    /** @var EvidenceInfo */
    public $evidence_info;

    /** @var array */
    public $documents;

    /** @var string */
    public $notes;

    /** @var string */
    public $source;

    /** @var string */
    public $date;

    /** @var string */
    public $item_id;
}
