<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The product information.
 */
class ProductDetails
{
	/** @var string */
	public $description;

	/** @var string */
	public $product_received;

	/** @var array */
	public $sub_reasons;

	/** @var string */
	public $purchase_url;
}
