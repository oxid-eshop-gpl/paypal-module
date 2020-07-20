<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The refund status.
 */
class RefundStatus
{
	public $status;

	/** @var OxidProfessionalServices\PayPal\Api\Model\RefundStatusDetails */
	public $status_details;
}
