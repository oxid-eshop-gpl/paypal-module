<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
    }
}
