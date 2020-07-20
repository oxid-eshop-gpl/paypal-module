<?php

namespace OxidProfessionalServices\PayPal\Api\Orders;

/**
 * The properties of a party.
 */
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
