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

    /**
     * @var array<TrackingInfo>
     * An array of relevant tracking information for the transaction involved in this dispute.
     */
    public $tracking_info;

    /**
     * @var array<string>
     * An array of refund IDs for the transaction involved in this dispute.
     */
    public $refund_ids;

    public function validate()
    {
    }
}
