<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A captured payment.
 *
 * generated from: model-update_capture_request.json
 */
class UpdateCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $status;

    /**
     * @var CaptureStatusDetails
     * The details of the captured payment status.
     */
    public $status_details;
}
