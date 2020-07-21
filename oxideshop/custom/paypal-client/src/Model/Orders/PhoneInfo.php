<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Phone information.
 */
class PhoneInfo implements JsonSerializable
{
    use BaseModel;

    const PHONE_TYPE_FAX = 'FAX';
    const PHONE_TYPE_HOME = 'HOME';
    const PHONE_TYPE_MOBILE = 'MOBILE';
    const PHONE_TYPE_OTHER = 'OTHER';
    const PHONE_TYPE_PAGER = 'PAGER';
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
