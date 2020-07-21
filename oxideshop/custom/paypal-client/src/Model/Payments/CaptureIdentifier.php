<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

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
