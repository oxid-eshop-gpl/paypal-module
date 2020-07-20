<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Resource consolidating common request and response attirbutes for vaulting PayPal Wallet.
 */
class VaultPaypalWalletBase
{
	public $description;
	public $product_label;

	/** @var OxidProfessionalServices\PayPal\Api\Model\ShippingDetail */
	public $shipping;
	public $usage_type;
	public $customer_type;
	public $permit_multiple_payment_tokens;
}
