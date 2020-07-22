<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Captures either a portion or the full order amount of an approved and saved order.
 *
 * generated from: order_capture_request.json
 */
class OrderCaptureRequest extends CaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $order_id;
}
