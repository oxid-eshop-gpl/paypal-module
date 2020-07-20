<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The return details for the product.
 */
class ReturnDetails
{
	/** @var string */
	public $mode;

	/** @var boolean */
	public $receipt;

	/** @var string */
	public $return_confirmation_number;

	/** @var boolean */
	public $returned;
}
