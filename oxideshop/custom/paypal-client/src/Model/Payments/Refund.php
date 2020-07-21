<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The refund information.
 */
class Refund extends \RefundStatus implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var Money */
	public $amount;

	/** @var string */
	public $invoice_id;

	/** @var string */
	public $note_to_payer;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Payments\SellerPayableBreakdown */
	public $SellerPayableBreakdown;

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
