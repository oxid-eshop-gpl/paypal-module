<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The authorized payment transaction.
 */
class Authorization extends \AuthorizationStatus
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
}
