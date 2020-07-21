<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The authorized payment transaction.
 */
class Authorization extends \AuthorizationStatus implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var Money */
	public $amount;

	/** @var string */
	public $invoice_id;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $alternate_id;

	/** @var SellerProtection */
	public $seller_protection;

	/** @var string */
	public $expiration_time;

	/** @var array */
	public $links;

	/** @var string */
	public $create_time;

	/** @var string */
	public $update_time;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
