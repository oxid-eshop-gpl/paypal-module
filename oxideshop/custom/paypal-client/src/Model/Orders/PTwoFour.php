<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information used to pay using P24(Przelewy24)
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-p24.json
 */
class PTwoFour implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The full name representation like Mr J Smith
     *
     * minLength: 3
     * maxLength: 300
     */
    public $name;

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

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * @var string
     * P24 generated payment description.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $payment_descriptor;

    /**
     * @var string
     * Numeric identifier of the payment scheme or bank used for the payment.
     *
     * minLength: 1
     * maxLength: 300
     */
    public $method_id;

    /**
     * @var string
     * Friendly name of the payment scheme or bank used for the payment
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $method_description;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength($this->name, 3, "name in PTwoFour must have minlength of 3 $within");
        !isset($this->name) || Assert::maxLength($this->name, 300, "name in PTwoFour must have maxlength of 300 $within");
        !isset($this->email) || Assert::minLength($this->email, 3, "email in PTwoFour must have minlength of 3 $within");
        !isset($this->email) || Assert::maxLength($this->email, 254, "email in PTwoFour must have maxlength of 254 $within");
        !isset($this->country_code) || Assert::minLength($this->country_code, 2, "country_code in PTwoFour must have minlength of 2 $within");
        !isset($this->country_code) || Assert::maxLength($this->country_code, 2, "country_code in PTwoFour must have maxlength of 2 $within");
        !isset($this->payment_descriptor) || Assert::minLength($this->payment_descriptor, 1, "payment_descriptor in PTwoFour must have minlength of 1 $within");
        !isset($this->payment_descriptor) || Assert::maxLength($this->payment_descriptor, 2000, "payment_descriptor in PTwoFour must have maxlength of 2000 $within");
        !isset($this->method_id) || Assert::minLength($this->method_id, 1, "method_id in PTwoFour must have minlength of 1 $within");
        !isset($this->method_id) || Assert::maxLength($this->method_id, 300, "method_id in PTwoFour must have maxlength of 300 $within");
        !isset($this->method_description) || Assert::minLength($this->method_description, 1, "method_description in PTwoFour must have minlength of 1 $within");
        !isset($this->method_description) || Assert::maxLength($this->method_description, 2000, "method_description in PTwoFour must have maxlength of 2000 $within");
    }

    public function __construct()
    {
    }
}
