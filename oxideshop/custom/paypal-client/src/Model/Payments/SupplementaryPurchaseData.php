<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The capture identification-related fields. Includes the invoice ID, custom ID, note to payer, and soft descriptor.
 */
class SupplementaryPurchaseData implements \JsonSerializable
{
	/** @var string */
	public $invoice_id;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $note_to_payer;

	/** @var string */
	public $soft_descriptor;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
