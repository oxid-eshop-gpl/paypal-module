<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The phone number, in its canonical international [E.164 numbering plan
 * format](https://www.itu.int/rec/T-REC-E.164/en).
 *
 * generated from: customer_common_overrides-person_phone_detail.json
 */
class PersonPhoneDetail extends Phone implements JsonSerializable
{
    use BaseModel;

    /** A fax machine. */
    const TYPE_FAX = 'FAX';

    /** A home phone. */
    const TYPE_HOME = 'HOME';

    /** A mobile phone. */
    const TYPE_MOBILE = 'MOBILE';

    /** Other. */
    const TYPE_OTHER = 'OTHER';

    /** A pager. */
    const TYPE_PAGER = 'PAGER';

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
     * @var boolean
     * Whether this is the primary mobile phone number of the user.
     */
    public $primary_mobile;

    /**
     * @var string
     * The phone type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_FAX
     * @see TYPE_HOME
     * @see TYPE_MOBILE
     * @see TYPE_OTHER
     * @see TYPE_PAGER
     * this is mandatory to be set
     */
    public $type;

    /**
     * @var array<string>
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
        !isset($this->contact_name) || Assert::minLength($this->contact_name, 1, "contact_name in PersonPhoneDetail must have minlength of 1 $within");
        !isset($this->contact_name) || Assert::maxLength($this->contact_name, 900, "contact_name in PersonPhoneDetail must have maxlength of 900 $within");
        Assert::notNull($this->type, "type in PersonPhoneDetail must not be NULL $within");
        Assert::notNull($this->tags, "tags in PersonPhoneDetail must not be NULL $within");
         Assert::minCount($this->tags, 0, "tags in PersonPhoneDetail must have min. count of 0 $within");
         Assert::maxCount($this->tags, 20, "tags in PersonPhoneDetail must have max. count of 20 $within");
         Assert::isArray($this->tags, "tags in PersonPhoneDetail must be array $within");
    }

    public function __construct()
    {
    }
}
