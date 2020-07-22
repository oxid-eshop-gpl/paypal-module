<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer-provided merchandise issue details for the dispute.
 *
 * generated from: response-merchandize_dispute_properties.json
 */
class MerchandizeDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /** The product has an issue. */
    const ISSUE_TYPE_PRODUCT = 'PRODUCT';

    /** The service has an issue. */
    const ISSUE_TYPE_SERVICE = 'SERVICE';

    /**
     * @var string
     * The issue type.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUE_TYPE_PRODUCT
     * @see ISSUE_TYPE_SERVICE
     * minLength: 1
     * maxLength: 255
     */
    public $issue_type;

    /**
     * @var ProductDetails
     * The product information.
     */
    public $product_details;

    /**
     * @var ServiceDetails
     * The service details.
     */
    public $service_details;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $return_shipping_address;
}
