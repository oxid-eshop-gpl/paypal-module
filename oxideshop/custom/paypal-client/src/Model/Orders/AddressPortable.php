<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The portable international postal address. Maps to
 * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
 * HTML 5.1 [Autofilling form controls: the autocomplete
 * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
 */
class AddressPortable implements JsonSerializable
{
    use BaseModel;

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
    public $country_code;

    /** @var AddressPortableAddressDetails */
    public $address_details;
}
