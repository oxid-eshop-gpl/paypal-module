<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Date of birth data provided by the user
 *
 * generated from: customer_common-v1-schema-account_model-birth_details.json
 */
class BirthDetails implements JsonSerializable
{
    use BaseModel;

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

    public function validate()
    {
        assert(!isset($this->date_of_birth) || strlen($this->date_of_birth) >= 10);
        assert(!isset($this->date_of_birth) || strlen($this->date_of_birth) <= 10);
    }
}
