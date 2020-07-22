<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $type;

    /**
     * @var array<string>
     * Array of tags for this phone number.
     */
    public $tags;
}
