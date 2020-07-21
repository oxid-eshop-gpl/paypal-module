<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The refund information.
 */
class Refund extends \RefundStatus
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
}
