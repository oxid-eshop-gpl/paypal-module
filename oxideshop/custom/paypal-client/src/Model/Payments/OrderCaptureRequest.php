<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Captures either a portion or the full order amount of an approved and saved order.
 */
class OrderCaptureRequest extends CaptureRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $order_id;
}
