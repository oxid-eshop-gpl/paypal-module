<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The intent to either capture payment immediately or authorize a payment for an order after order creation.
 */
class CheckoutPaymentIntent implements \JsonSerializable
{
    use BaseModel;
}
