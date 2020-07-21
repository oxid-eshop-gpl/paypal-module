<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Captures either a portion or the full order amount of an approved and saved order.
 */
class OrderCaptureRequest extends \CaptureRequest implements \JsonSerializable
{
    /** @var string */
    public $order_id;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
