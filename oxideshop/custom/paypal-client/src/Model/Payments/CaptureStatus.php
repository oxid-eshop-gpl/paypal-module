<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The status of a captured payment.
 */
class CaptureStatus implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $status;

    /** @var CaptureStatusDetails */
    public $status_details;
}
