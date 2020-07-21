<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The evidence-related information.
 */
class EvidenceInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $tracking_info;

    /** @var array */
    public $refund_ids;
}
