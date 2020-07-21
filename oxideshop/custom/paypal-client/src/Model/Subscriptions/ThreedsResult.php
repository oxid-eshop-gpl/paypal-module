<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * Additional 3D Secure authentication data.
 */
class ThreedsResult extends \AuthenticationResultType
{
	/** @var string */
	public $eci_flag;

	/** @var string */
	public $ucaf_indicator;

	/** @var string */
	public $card_brand;

	/** @var string */
	public $cavv;

	/** @var string */
	public $xid;

	/** @var string */
	public $enrolled;

	/** @var string */
	public $pares_status;

	/** @var string */
	public $merchant_name;

	/** @var string */
	public $three_ds_version;

	/** @var string */
	public $directory_server_transaction_id;

	/** @var string */
	public $authentication_type;

	/** @var string */
	public $access_control_server_transaction_id;

	/** @var string */
	public $signature_verification_status;

	/** @var string */
	public $paypal_acquiring_mid;

	/** @var string */
	public $paypal_acquiring_bin;

	/** @var string */
	public $cavv_algorithm;

	/** @var string */
	public $three_ds_server_transaction_id;
}
