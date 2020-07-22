<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The portable international postal address. Maps to
 * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
 * HTML 5.1 [Autofilling form controls: the autocomplete
 * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
 *
 * generated from: common_components-v3-schema-json-openapi-2.0-address_portable.json
 */
class AddressPortable implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The first line of the address. For example, number or street. For example, `173 Drury Lane`. Required for data
     * entry and compliance and risk checks. Must contain the full address.
     *
     * maxLength: 300
     */
    public $address_line_1;

    /**
     * @var string
     * The second line of the address. For example, suite or apartment number.
     *
     * maxLength: 300
     */
    public $address_line_2;

    /**
     * @var string
     * The third line of the address, if needed. For example, a street complement for Brazil, direction text, such as
     * `next to Walmart`, or a landmark in an Indian address.
     *
     * maxLength: 300
     */
    public $address_line_3;

    /**
     * @var string
     * The neighborhood, ward, or district. Smaller than `admin_area_level_3` or `sub_locality`. Value is:<ul><li>The
     * postal sorting code that is used in Guernsey and many French territories, such as French Guiana.</li><li>The
     * fine-grained administrative levels in China.</li></ul>
     *
     * maxLength: 300
     */
    public $admin_area_4;

    /**
     * @var string
     * A sub-locality, suburb, neighborhood, or district. Smaller than `admin_area_level_2`. Value is:<ul><li>Brazil.
     * Suburb, bairro, or neighborhood.</li><li>India. Sub-locality or district. Street name information is not
     * always available but a sub-locality or district can be a very small area.</li></ul>
     *
     * maxLength: 300
     */
    public $admin_area_3;

    /**
     * @var string
     * A city, town, or village. Smaller than `admin_area_level_1`.
     *
     * maxLength: 300
     */
    public $admin_area_2;

    /**
     * @var string
     * The highest level sub-division in a country, which is usually a province, state, or ISO-3166-2 subdivision.
     * Format for postal delivery. For example, `CA` and not `California`. Value, by country, is:<ul><li>UK. A
     * county.</li><li>US. A state.</li><li>Canada. A province.</li><li>Japan. A prefecture.</li><li>Switzerland. A
     * kanton.</li></ul>
     *
     * maxLength: 300
     */
    public $admin_area_1;

    /**
     * @var string
     * The postal code, which is the zip code or equivalent. Typically required for countries with a postal code or
     * an equivalent. See [postal code](https://en.wikipedia.org/wiki/Postal_code).
     *
     * maxLength: 60
     */
    public $postal_code;

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * @var AddressPortableAddressDetails
     * The non-portable additional address details that are sometimes needed for compliance, risk, or other scenarios
     * where fine-grain address information might be needed. Not portable with common third party and opensource.
     * Redundant with core fields. For example, `address_portable.address_line_1` is usually a combination of
     * `address_details.street_number` and `street_name` and `street_type`.
     */
    public $address_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->address_line_1) || Assert::maxLength($this->address_line_1, 300, "address_line_1 in AddressPortable must have maxlength of 300 $within");
        !isset($this->address_line_2) || Assert::maxLength($this->address_line_2, 300, "address_line_2 in AddressPortable must have maxlength of 300 $within");
        !isset($this->address_line_3) || Assert::maxLength($this->address_line_3, 300, "address_line_3 in AddressPortable must have maxlength of 300 $within");
        !isset($this->admin_area_4) || Assert::maxLength($this->admin_area_4, 300, "admin_area_4 in AddressPortable must have maxlength of 300 $within");
        !isset($this->admin_area_3) || Assert::maxLength($this->admin_area_3, 300, "admin_area_3 in AddressPortable must have maxlength of 300 $within");
        !isset($this->admin_area_2) || Assert::maxLength($this->admin_area_2, 300, "admin_area_2 in AddressPortable must have maxlength of 300 $within");
        !isset($this->admin_area_1) || Assert::maxLength($this->admin_area_1, 300, "admin_area_1 in AddressPortable must have maxlength of 300 $within");
        !isset($this->postal_code) || Assert::maxLength($this->postal_code, 60, "postal_code in AddressPortable must have maxlength of 60 $within");
        !isset($this->country_code) || Assert::minLength($this->country_code, 2, "country_code in AddressPortable must have minlength of 2 $within");
        !isset($this->country_code) || Assert::maxLength($this->country_code, 2, "country_code in AddressPortable must have maxlength of 2 $within");
        !isset($this->address_details) || Assert::isInstanceOf($this->address_details, AddressPortableAddressDetails::class, "address_details in AddressPortable must be instance of AddressPortableAddressDetails $within");
        !isset($this->address_details) || $this->address_details->validate(AddressPortable::class);
    }

    public function __construct()
    {
    }
}
