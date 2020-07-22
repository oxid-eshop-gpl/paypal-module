<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The status of a captured payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-capture_status.json
 */
class CaptureStatus implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $status;

    /**
     * @var CaptureStatusDetails
     * The details of the captured payment status.
     */
    public $status_details;
}
