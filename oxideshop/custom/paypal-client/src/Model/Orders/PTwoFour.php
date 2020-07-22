<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
