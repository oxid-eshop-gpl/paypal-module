<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The evidence-related information.
 *
 * generated from: response-evidence_info.json
 */
class EvidenceInfo implements JsonSerializable
{
    use BaseModel;

    /** @var array<TrackingInfo> */
    public $tracking_info;

    /** @var array */
    public $refund_ids;
}
