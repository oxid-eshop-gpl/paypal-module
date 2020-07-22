<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Phone information.
 *
 * generated from: model-phone_info.json
 */
class PhoneInfo implements JsonSerializable
{
    use BaseModel;

    /** A fax machine. */
    const PHONE_TYPE_FAX = 'FAX';

    /** A home phone. */
    const PHONE_TYPE_HOME = 'HOME';

    /** A mobile phone. */
    const PHONE_TYPE_MOBILE = 'MOBILE';

    /** Other. */
    const PHONE_TYPE_OTHER = 'OTHER';

    /** A pager. */
    const PHONE_TYPE_PAGER = 'PAGER';

    /** A work phone. */
    const PHONE_TYPE_WORK = 'WORK';

    /**
     * @var Phone
     * The phone number in its canonical international [E.164 numbering plan
     * format](https://www.itu.int/rec/T-REC-E.164/en).
     */
    public $phone_number;

    /**
     * @var string
     * The phone type.
     *
     * use one of constants defined in this class to set the value:
     * @see PHONE_TYPE_FAX
     * @see PHONE_TYPE_HOME
     * @see PHONE_TYPE_MOBILE
     * @see PHONE_TYPE_OTHER
     * @see PHONE_TYPE_PAGER
     * @see PHONE_TYPE_WORK
     */
    public $phone_type;
}
