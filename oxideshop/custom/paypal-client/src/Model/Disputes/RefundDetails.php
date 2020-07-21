<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The refund details.
 */
class RefundDetails
{
	/** @var Money */
	public $allowed_refund_amount;

	/** @var array */
	public $refunds;
}
