<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

class VaultedPayPalWalletCommonAttributes
{
	/** @var string */
	public $description;

	/** @var string */
	public $product_label;

	/** @var string */
	public $usage_type;

	/** @var string */
	public $customer_type;

	/** @var boolean */
	public $permit_multiple_payment_tokens;
}
