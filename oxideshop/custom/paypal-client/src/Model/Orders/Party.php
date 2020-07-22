<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * minLength: 1
     * maxLength: 30
     */
    public $id;

    /**
     * @var string
     * External identifier for a party, it could be venmo id, facebook email etc.
     *
     * minLength: 1
     * maxLength: 30
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
     *
     * minLength: 3
     * maxLength: 254
     */
    public $primary_email;

    /**
     * @var string[]
     * Email addresses.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 100
     */
    public $emails;

    /**
     * @var PhoneInfo[]
     * Details of party's phone numbers.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 100
     */
    public $phones;

    /**
     * @var AddressWithConfirmation[]
     * Details of party's addresses.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 100
     */
    public $addresses;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in Party must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 30, "id in Party must have maxlength of 30 $within");
        !isset($this->external_id) || Assert::minLength($this->external_id, 1, "external_id in Party must have minlength of 1 $within");
        !isset($this->external_id) || Assert::maxLength($this->external_id, 30, "external_id in Party must have maxlength of 30 $within");
        !isset($this->primary_email) || Assert::minLength($this->primary_email, 3, "primary_email in Party must have minlength of 3 $within");
        !isset($this->primary_email) || Assert::maxLength($this->primary_email, 254, "primary_email in Party must have maxlength of 254 $within");
        Assert::notNull($this->emails, "emails in Party must not be NULL $within");
         Assert::minCount($this->emails, 1, "emails in Party must have min. count of 1 $within");
         Assert::maxCount($this->emails, 100, "emails in Party must have max. count of 100 $within");
         Assert::isArray($this->emails, "emails in Party must be array $within");
        Assert::notNull($this->phones, "phones in Party must not be NULL $within");
         Assert::minCount($this->phones, 1, "phones in Party must have min. count of 1 $within");
         Assert::maxCount($this->phones, 100, "phones in Party must have max. count of 100 $within");
         Assert::isArray($this->phones, "phones in Party must be array $within");

                                if (isset($this->phones)){
                                    foreach ($this->phones as $item) {
                                        $item->validate(Party::class);
                                    }
                                }

        Assert::notNull($this->addresses, "addresses in Party must not be NULL $within");
         Assert::minCount($this->addresses, 1, "addresses in Party must have min. count of 1 $within");
         Assert::maxCount($this->addresses, 100, "addresses in Party must have max. count of 100 $within");
         Assert::isArray($this->addresses, "addresses in Party must be array $within");

                                if (isset($this->addresses)){
                                    foreach ($this->addresses as $item) {
                                        $item->validate(Party::class);
                                    }
                                }

        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in Party must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in Party must have maxlength of 64 $within");
        !isset($this->update_time) || Assert::minLength($this->update_time, 20, "update_time in Party must have minlength of 20 $within");
        !isset($this->update_time) || Assert::maxLength($this->update_time, 64, "update_time in Party must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
