<?php

namespace OxidProfessionalServices\PayPal\Api\Payments;

/**
 * The capture identification-related fields. Includes the invoice ID, custom ID, note to payer, and soft descriptor.
 */
class CaptureIdentifier
{
	/** @var string */
	public $invoice_id;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $note_to_payer;

	/** @var string */
	public $soft_descriptor;
}
