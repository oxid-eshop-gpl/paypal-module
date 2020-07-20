<?php

namespace OxidProfessionalServices\PayPal\Model\Payments;

/**
 * Refunds a captured payment, by ID. For a full refund, include an empty request body. For a partial refund, include an <code>amount</code> object in the request body.
 */
class RefundRequest
{
	/** @var string */
	public $invoice_id;

	/** @var string */
	public $custom_id;

	/** @var string */
	public $note_to_payer;
}
