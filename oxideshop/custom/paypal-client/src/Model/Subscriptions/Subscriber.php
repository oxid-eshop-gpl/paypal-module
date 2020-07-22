<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The subscriber response information.
 *
 * generated from: subscriber.json
 */
class Subscriber extends Payer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping_address;

    /**
     * @var PaymentSourceResponse
     * The payment source used to fund the payment.
     */
    public $payment_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->shipping_address) || Assert::isInstanceOf($this->shipping_address, ShippingDetail::class, "shipping_address in Subscriber must be instance of ShippingDetail $within");
        !isset($this->shipping_address) || $this->shipping_address->validate(Subscriber::class);
        !isset($this->payment_source) || Assert::isInstanceOf($this->payment_source, PaymentSourceResponse::class, "payment_source in Subscriber must be instance of PaymentSourceResponse $within");
        !isset($this->payment_source) || $this->payment_source->validate(Subscriber::class);
    }

    public function __construct()
    {
    }
}
