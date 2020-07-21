<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A resource that identies that a paypal wallet is used for payment.
 */
class PaypalWallet implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The merchant-preferred payment methods.
     */
    public $payment_method_preference;

    /**
     * @var PaypalWalletAttributes
     * Additional attributes associated with the use of this paypal wallet
     */
    public $attributes;
}
