<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

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
