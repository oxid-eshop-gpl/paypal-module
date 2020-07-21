<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Address and confirmation details.
 */
class AddressWithConfirmation extends \AddressName
{
	/** @var string */
	public $id;

	/** @var string */
	public $confirmation_status;

	/** @var string */
	public $confirmation_authority;
}
