<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The portable international postal address. Maps to [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and HTML 5.1 [Autofilling form controls: the autocomplete attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
 */
class AddressPortable
{
	public $address_line_1;
	public $address_line_2;
	public $address_line_3;
	public $admin_area_4;
	public $admin_area_3;
	public $admin_area_2;
	public $admin_area_1;
	public $postal_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\CountryCode */
	public $country_code;
	public $address_details;
}
