<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Completes an capture payment for an order.
 */
class OrderCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** @var PaymentSource */
    public $payment_source;
}
