<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The shipping details.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-shipping_detail.json
 */
class ShippingDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Name
     * The name of the party.
     */
    public $name;

    /** @var array<ShippingOption> */
    public $options;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $address;
}
