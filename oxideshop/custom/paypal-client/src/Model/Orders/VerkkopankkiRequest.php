<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information needed to pay using Verkkopankki (Finnish Online Banking).
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-verkkopankki_request.json
 */
class VerkkopankkiRequest implements JsonSerializable
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
     * The numeric bank identifier of the account holder associated with this payment method. Valid bank ids at the
     * moment are 50 (Aktia), 3 (Danske Bank), 6 (Handelsbanken), 1 Nordea, 61 (Oma Säästöpankki), 2
     * (Osuuspankki), 51 (POP Pankki), (10) S-Pankki, (52) Säästöpankki, (5) Ålandsbanken
     *
     * minLength: 1
     * maxLength: 255
     */
    public $bank_id;

    public function validate()
    {
        assert(!isset($this->name) || strlen($this->name) >= 3);
        assert(!isset($this->name) || strlen($this->name) <= 300);
        assert(!isset($this->email) || strlen($this->email) >= 3);
        assert(!isset($this->email) || strlen($this->email) <= 254);
        assert(!isset($this->country_code) || strlen($this->country_code) >= 2);
        assert(!isset($this->country_code) || strlen($this->country_code) <= 2);
        assert(!isset($this->bank_id) || strlen($this->bank_id) >= 1);
        assert(!isset($this->bank_id) || strlen($this->bank_id) <= 255);
    }
}
