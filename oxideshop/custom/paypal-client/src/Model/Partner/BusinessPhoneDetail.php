<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * @var string[]
     * Array of tags for this phone number.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 20
     */
    public $tags;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->contact_name) || Assert::minLength($this->contact_name, 1, "contact_name in BusinessPhoneDetail must have minlength of 1 $within");
        !isset($this->contact_name) || Assert::maxLength($this->contact_name, 900, "contact_name in BusinessPhoneDetail must have maxlength of 900 $within");
        Assert::notNull($this->type, "type in BusinessPhoneDetail must not be NULL $within");
         Assert::minLength($this->type, 1, "type in BusinessPhoneDetail must have minlength of 1 $within");
         Assert::maxLength($this->type, 255, "type in BusinessPhoneDetail must have maxlength of 255 $within");
        Assert::notNull($this->tags, "tags in BusinessPhoneDetail must not be NULL $within");
         Assert::minCount($this->tags, 0, "tags in BusinessPhoneDetail must have min. count of 0 $within");
         Assert::maxCount($this->tags, 20, "tags in BusinessPhoneDetail must have max. count of 20 $within");
         Assert::isArray($this->tags, "tags in BusinessPhoneDetail must be array $within");
    }

    public function __construct()
    {
    }
}
