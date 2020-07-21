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

    const PAYMENT_METHOD_PREFERENCE_UNRESTRICTED = 'UNRESTRICTED';
    const PAYMENT_METHOD_PREFERENCE_IMMEDIATE_PAYMENT_REQUIRED = 'IMMEDIATE_PAYMENT_REQUIRED';

    /**
     * @var string
     * The merchant-preferred payment methods.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_METHOD_PREFERENCE_UNRESTRICTED
     * @see PAYMENT_METHOD_PREFERENCE_IMMEDIATE_PAYMENT_REQUIRED
     */
    public $payment_method_preference;

    /**
     * @var PaypalWalletAttributes
     * Additional attributes associated with the use of this paypal wallet
     */
    public $attributes;
}
