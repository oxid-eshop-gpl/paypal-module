<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The refund status.
 */
class RefundStatus
{
	/** @var string */
	public $status;

	/** @var RefundStatusDetails */
	public $status_details;
}
