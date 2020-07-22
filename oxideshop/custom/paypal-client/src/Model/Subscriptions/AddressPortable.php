<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The portable international postal address. Maps to
 * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
 * HTML 5.1 [Autofilling form controls: the autocomplete
 * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-address_portable.json
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

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     */
    public $country_code;

    /** @var AddressPortableAddressDetails */
    public $address_details;
}
