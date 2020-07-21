<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

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

	/** @var string */
	public $primary_email;

	/** @var array */
	public $emails;

	/** @var array */
	public $phones;

	/** @var array */
	public $addresses;

	/** @var string */
	public $create_time;

	/** @var string */
	public $update_time;
}
