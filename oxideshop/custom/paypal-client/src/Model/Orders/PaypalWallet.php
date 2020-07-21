<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A resource that identies that a paypal wallet is used for payment.
 */
class PaypalWallet implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $payment_method_preference;

    /** @var PaypalWalletAttributes */
    public $attributes;
}
