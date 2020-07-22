<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A resource that identies that a paypal wallet is used for payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-paypal_wallet.json
 */
class PaypalWallet implements JsonSerializable
{
    use BaseModel;

    /** Accepts any type of payment from the customer. */
    const PAYMENT_METHOD_PREFERENCE_UNRESTRICTED = 'UNRESTRICTED';

    /** Accepts only immediate payment from the customer. For example, credit card, PayPal balance, or instant ACH. Ensures that at the time of capture, the payment does not have the `pending` status. */
    const PAYMENT_METHOD_PREFERENCE_IMMEDIATE_PAYMENT_REQUIRED = 'IMMEDIATE_PAYMENT_REQUIRED';

    /**
     * @var string
     * The merchant-preferred payment methods.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYMENT_METHOD_PREFERENCE_UNRESTRICTED
     * @see PAYMENT_METHOD_PREFERENCE_IMMEDIATE_PAYMENT_REQUIRED
     * minLength: 1
     * maxLength: 255
     */
    public $payment_method_preference = 'UNRESTRICTED';

    /**
     * @var PaypalWalletAttributes
     * Additional attributes associated with the use of this paypal wallet
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_method_preference) || Assert::minLength($this->payment_method_preference, 1, "payment_method_preference in PaypalWallet must have minlength of 1 $within");
        !isset($this->payment_method_preference) || Assert::maxLength($this->payment_method_preference, 255, "payment_method_preference in PaypalWallet must have maxlength of 255 $within");
        !isset($this->attributes) || Assert::isInstanceOf($this->attributes, PaypalWalletAttributes::class, "attributes in PaypalWallet must be instance of PaypalWalletAttributes $within");
        !isset($this->attributes) || $this->attributes->validate(PaypalWallet::class);
    }

    public function __construct()
    {
    }
}
