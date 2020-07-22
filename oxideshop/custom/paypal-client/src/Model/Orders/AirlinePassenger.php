<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The airline passenger details.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-airline_passenger.json
 */
class AirlinePassenger implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Name
     * The name of the party.
     */
    public $name;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * minLength: 10
     * maxLength: 10
     */
    public $date_of_birth;

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
     * @var string
     * The card holder-supplied code to the merchant. Can be used for passing in the frequent flyer number of the
     * customer.
     *
     * minLength: 1
     * maxLength: 17
     */
    public $customer_code;

    public function validate()
    {
        assert(!isset($this->date_of_birth) || strlen($this->date_of_birth) >= 10);
        assert(!isset($this->date_of_birth) || strlen($this->date_of_birth) <= 10);
        assert(!isset($this->country_code) || strlen($this->country_code) >= 2);
        assert(!isset($this->country_code) || strlen($this->country_code) <= 2);
        assert(!isset($this->customer_code) || strlen($this->customer_code) >= 1);
        assert(!isset($this->customer_code) || strlen($this->customer_code) <= 17);
    }
}
