<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * A simple postal address with coarse-grained fields.
 */
class BusinessAddressDetail extends \AddressPortable
{
	/** @var string */
	public $type;

	/** @var boolean */
	public $primary;

	/** @var boolean */
	public $inactive;
}
