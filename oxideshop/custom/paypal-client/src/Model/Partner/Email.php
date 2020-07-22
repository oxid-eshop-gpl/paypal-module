<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * An email address at which the person or business can be contacted.
 *
 * generated from: customer_common_overrides-email.json
 */
class Email implements JsonSerializable
{
    use BaseModel;

    /** The email ID to be used to contact the customer service of the business. */
    const TYPE_CUSTOMER_SERVICE = 'CUSTOMER_SERVICE';

    /**
     * @var string
     * The role of the email address.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CUSTOMER_SERVICE
     * minLength: 1
     * maxLength: 50
     */
    public $type;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * minLength: 3
     * maxLength: 254
     */
    public $email;
}
