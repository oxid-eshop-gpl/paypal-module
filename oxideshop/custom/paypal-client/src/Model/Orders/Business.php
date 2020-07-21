<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Business information.
 */
class Business extends \Party implements \JsonSerializable
{
	/** @var array */
	public $names;

	/** @var string */
	public $type;

	/** @var BusinessCategory */
	public $category;

	/** @var array */
	public $identifications;

	/** @var string */
	public $description;

	/** @var array */
	public $owners;

	/** @var string */
	public $url;

	/** @var CustomerServiceContact */
	public $customer_service_contacts;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
