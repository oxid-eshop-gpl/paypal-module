<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class Party
{
	/** @var string */
	public $id;

	/** @var string */
	public $external_id;

	/** @var boolean */
	public $primary;

	/** @var array */
	public $emails;

	/** @var array */
	public $phones;

	/** @var array */
	public $addresses;
}
