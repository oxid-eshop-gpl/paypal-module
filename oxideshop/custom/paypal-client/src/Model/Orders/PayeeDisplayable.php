<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout,
 * transactions, email receipts, and transaction history.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payee_displayable.json
 */
class PayeeDisplayable implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * maxLength: 254
     */
    public $business_email;

    /**
     * @var Phone
     * The phone number, in its canonical international [E.164 numbering plan
     * format](https://www.itu.int/rec/T-REC-E.164/en).
     */
    public $business_phone;

    /**
     * @var string
     * The name of the merchant. Appears to the customer in checkout, payment transactions, email receipts, and
     * transaction history.
     *
     * maxLength: 127
     */
    public $brand_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->business_email) || Assert::maxLength($this->business_email, 254, "business_email in PayeeDisplayable must have maxlength of 254 $within");
        !isset($this->business_phone) || Assert::notNull($this->business_phone->country_code, "country_code in business_phone must not be NULL within PayeeDisplayable $within");
        !isset($this->business_phone) || Assert::notNull($this->business_phone->national_number, "national_number in business_phone must not be NULL within PayeeDisplayable $within");
        !isset($this->business_phone) || Assert::isInstanceOf($this->business_phone, Phone::class, "business_phone in PayeeDisplayable must be instance of Phone $within");
        !isset($this->business_phone) || $this->business_phone->validate(PayeeDisplayable::class);
        !isset($this->brand_name) || Assert::maxLength($this->brand_name, 127, "brand_name in PayeeDisplayable must have maxlength of 127 $within");
    }

    public function __construct()
    {
    }
}
