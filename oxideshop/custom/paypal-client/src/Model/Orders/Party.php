<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The properties of a party.
 *
 * generated from: model-party.json
 */
class Party implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Unique identifier for a party.
     */
    public $id;

    /**
     * @var string
     * External identifier for a party, it could be venmo id, facebook email etc.
     */
    public $external_id;

    /**
     * @var boolean
     * Indicates if the party is primary Party.
     */
    public $primary;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     */
    public $primary_email;

    /**
     * @var array<string>
     * Email addresses.
     */
    public $emails;

    /**
     * @var array<PhoneInfo>
     * Details of party's phone numbers.
     */
    public $phones;

    /**
     * @var array<AddressWithConfirmation>
     * Details of party's addresses.
     */
    public $addresses;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $update_time;
}
