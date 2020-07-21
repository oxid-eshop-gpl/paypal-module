<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The return details for the product.
 */
class ReturnDetails
{
	/** @var string */
	public $return_time;

	/** @var string */
	public $mode;

	/** @var boolean */
	public $receipt;

	/** @var string */
	public $return_confirmation_number;

	/** @var boolean */
	public $returned;
}
