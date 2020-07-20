<?php

namespace OxidProfessionalServices\PayPal\Api\Payments;

/**
 * The portable international postal address. Maps to [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and HTML 5.1 [Autofilling form controls: the autocomplete attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
 */
class PortablePostalAddressMediumGrained
{
	/** @var string */
	public $address_line_1;

	/** @var string */
	public $address_line_2;

	/** @var string */
	public $admin_area_2;

	/** @var string */
	public $admin_area_1;

	/** @var string */
	public $postal_code;
}
