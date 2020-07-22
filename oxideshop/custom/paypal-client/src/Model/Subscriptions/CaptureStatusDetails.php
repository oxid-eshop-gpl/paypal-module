<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the captured payment status.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-capture_status_details.json
 */
class CaptureStatusDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
