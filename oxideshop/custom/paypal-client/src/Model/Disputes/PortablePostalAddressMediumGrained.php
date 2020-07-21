<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class PortablePostalAddressMediumGrained
{
	/** @var string */
	public $address_line_1;

	/** @var string */
	public $address_line_2;

	/** @var string */
	public $address_line_3;

	/** @var string */
	public $admin_area_4;

	/** @var string */
	public $admin_area_3;

	/** @var string */
	public $admin_area_2;

	/** @var string */
	public $admin_area_1;

	/** @var string */
	public $postal_code;

	/** @var string */
	public $street_number;

	/** @var string */
	public $street_name;

	/** @var string */
	public $street_type;

	/** @var string */
	public $delivery_service;

	/** @var string */
	public $building_name;

	/** @var string */
	public $sub_building;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Disputes\AddressDetails */
	public $AddressDetails;
}
