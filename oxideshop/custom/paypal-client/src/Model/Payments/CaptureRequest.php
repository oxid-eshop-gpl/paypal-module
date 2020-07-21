<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Captures either a portion or the full authorized amount of an authorized payment.
 */
class CaptureRequest extends \SupplementaryPurchaseData implements \JsonSerializable
{
	/** @var Money */
	public $amount;

	/** @var boolean */
	public $final_capture;

	/** @var PaymentInstruction */
	public $payment_instruction;

	/** @var SupplementaryData */
	public $supplementary_data;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
