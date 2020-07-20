<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The customer's wallet used to fund the transaction.
 */
class WalletsResponse
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\ApplePayWalletResponse */
	public $apple_pay;
}
