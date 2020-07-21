<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * A resource that identies that a paypal wallet is used for payment.
 */
class PaypalWallet
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PayeePaymentMethodPreference */
	public $payment_method_preference;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PaypalWalletAttributes */
	public $attributes;
}
