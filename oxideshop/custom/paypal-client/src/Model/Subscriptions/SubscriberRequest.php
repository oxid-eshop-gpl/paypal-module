<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The subscriber request information .
 *
 * generated from: subscriber_request.json
 */
class SubscriberRequest extends Payer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping_address;

    /**
     * @var PaymentSource
     * The payment source definition. To be eligible to create subscription using debit or credit card, you will need
     * to sign up here (https://www.paypal.com/bizsignup/entry/product/ppcp). Please note, its available only for
     * non-3DS cards and for merchants in US and AU regions.
     */
    public $payment_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->shipping_address) || Assert::isInstanceOf($this->shipping_address, ShippingDetail::class, "shipping_address in SubscriberRequest must be instance of ShippingDetail $within");
        !isset($this->shipping_address) || $this->shipping_address->validate(SubscriberRequest::class);
        !isset($this->payment_source) || Assert::isInstanceOf($this->payment_source, PaymentSource::class, "payment_source in SubscriberRequest must be instance of PaymentSource $within");
        !isset($this->payment_source) || $this->payment_source->validate(SubscriberRequest::class);
    }

    public function __construct()
    {
    }
}
