<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Resource consolidating common request and response attirbutes for vaulting PayPal Wallet.
 */
class VaultPaypalWalletBase implements \JsonSerializable
{
	/** @var string */
	public $description;

	/** @var string */
	public $product_label;

	/** @var ShippingDetail */
	public $shipping;

	/** @var string */
	public $usage_type;

	/** @var string */
	public $customer_type;

	/** @var boolean */
	public $permit_multiple_payment_tokens;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
