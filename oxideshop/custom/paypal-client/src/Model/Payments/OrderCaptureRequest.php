<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Captures either a portion or the full order amount of an approved and saved order.
 *
 * generated from: order_capture_request.json
 */
class OrderCaptureRequest extends CaptureRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The identifier of the order for this capture.
     */
    public $order_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    public function __construct()
    {
    }
}
