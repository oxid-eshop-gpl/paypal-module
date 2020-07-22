<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 *
 * generated from: customer_common_overrides-business_phone_detail.json
 */
class BusinessPhoneDetail extends Phone implements JsonSerializable
{
    use BaseModel;

    /** The customer service phone number. */
    const TYPE_CUSTOMER_SERVICE = 'CUSTOMER_SERVICE';

    /**
     * @var string
     * The name that the phone number is connected to.
     *
     * minLength: 1
     * maxLength: 900
     */
    public $contact_name;

    /**
     * @var boolean
     * Whether this phone number has been inactivated by the user.
     */
    public $inactive;

    /**
     * @var boolean
     * Whether this is the primary contact phone number of the user.
     */
    public $primary;

    /**
     * @var string
     * The type of phone number provided. For example, home, work, or mobile.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CUSTOMER_SERVICE
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * @var array<string>
     * Array of tags for this phone number.
     */
    public $tags;

    public function validate()
    {
        assert(!isset($this->contact_name) || strlen($this->contact_name) >= 1);
        assert(!isset($this->contact_name) || strlen($this->contact_name) <= 900);
        assert(!isset($this->type) || strlen($this->type) >= 1);
        assert(!isset($this->type) || strlen($this->type) <= 255);
    }
}
