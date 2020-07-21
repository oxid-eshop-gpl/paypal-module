<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The portable international postal address. Maps to [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and HTML 5.1 [Autofilling form controls: the autocomplete attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
 */
class AddressPortable implements \JsonSerializable
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
    public $country_code;

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

    /** @var OxidProfessionalServices\PayPal\Api\Model\Subscriptions\AddressDetails */
    public $AddressDetails;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
