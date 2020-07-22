<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->tracking_info) || Assert::isArray($this->tracking_info, "tracking_info in EvidenceInfo must be array $within");

                                if (isset($this->tracking_info)){
                                    foreach ($this->tracking_info as $item) {
                                        $item->validate(EvidenceInfo::class);
                                    }
                                }

        !isset($this->refund_ids) || Assert::isArray($this->refund_ids, "refund_ids in EvidenceInfo must be array $within");
    }

    public function __construct()
    {
    }
}
