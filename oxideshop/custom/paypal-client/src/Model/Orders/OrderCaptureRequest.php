<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Completes an capture payment for an order.
 *
 * generated from: order_capture_request.json
 */
class OrderCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var PaymentSource
     * The payment source definition.
     */
    public $payment_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_source) || Assert::isInstanceOf($this->payment_source, PaymentSource::class, "payment_source in OrderCaptureRequest must be instance of PaymentSource $within");
        !isset($this->payment_source) || $this->payment_source->validate(OrderCaptureRequest::class);
    }

    public function __construct()
    {
    }
}
