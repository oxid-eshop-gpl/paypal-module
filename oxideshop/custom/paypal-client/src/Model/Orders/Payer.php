<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer who approves and pays for the order. The customer is also known as the payer.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payer.json
 */
class Payer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Name
     * The name of the party.
     */
    public $name;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * maxLength: 254
     */
    public $email_address;

    /**
     * @var string
     * The account identifier for a PayPal account.
     *
     * minLength: 13
     * maxLength: 13
     */
    public $payer_id;

    /**
     * @var PhoneWithType
     * The phone information.
     */
    public $phone;

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
    public $birth_date;

    /**
     * @var TaxInfo
     * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
     * required.
     */
    public $tax_info;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $address;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::isInstanceOf($this->name, Name::class, "name in Payer must be instance of Name $within");
        !isset($this->name) || $this->name->validate(Payer::class);
        !isset($this->email_address) || Assert::maxLength($this->email_address, 254, "email_address in Payer must have maxlength of 254 $within");
        !isset($this->payer_id) || Assert::minLength($this->payer_id, 13, "payer_id in Payer must have minlength of 13 $within");
        !isset($this->payer_id) || Assert::maxLength($this->payer_id, 13, "payer_id in Payer must have maxlength of 13 $within");
        !isset($this->phone) || Assert::notNull($this->phone->phone_number, "phone_number in phone must not be NULL within Payer $within");
        !isset($this->phone) || Assert::isInstanceOf($this->phone, PhoneWithType::class, "phone in Payer must be instance of PhoneWithType $within");
        !isset($this->phone) || $this->phone->validate(Payer::class);
        !isset($this->birth_date) || Assert::minLength($this->birth_date, 10, "birth_date in Payer must have minlength of 10 $within");
        !isset($this->birth_date) || Assert::maxLength($this->birth_date, 10, "birth_date in Payer must have maxlength of 10 $within");
        !isset($this->tax_info) || Assert::notNull($this->tax_info->tax_id, "tax_id in tax_info must not be NULL within Payer $within");
        !isset($this->tax_info) || Assert::notNull($this->tax_info->tax_id_type, "tax_id_type in tax_info must not be NULL within Payer $within");
        !isset($this->tax_info) || Assert::isInstanceOf($this->tax_info, TaxInfo::class, "tax_info in Payer must be instance of TaxInfo $within");
        !isset($this->tax_info) || $this->tax_info->validate(Payer::class);
        !isset($this->address) || Assert::notNull($this->address->country_code, "country_code in address must not be NULL within Payer $within");
        !isset($this->address) || Assert::isInstanceOf($this->address, AddressPortable::class, "address in Payer must be instance of AddressPortable $within");
        !isset($this->address) || $this->address->validate(Payer::class);
    }

    public function __construct()
    {
    }
}
