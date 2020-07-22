<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information needed to pay using Trustly.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-trustly.json
 */
class Trustly implements JsonSerializable
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
     * The business identification code (BIC). In payments systems, a BIC is used to identify a specific business,
     * most commonly a bank
     *
     * minLength: 8
     * maxLength: 11
     */
    public $bic;

    /**
     * @var string
     * The last characters of the IBAN used to pay.
     *
     * minLength: 4
     * maxLength: 34
     */
    public $iban_last_chars;

    public function validate()
    {
        assert(!isset($this->name) || strlen($this->name) >= 3);
        assert(!isset($this->name) || strlen($this->name) <= 300);
        assert(!isset($this->country_code) || strlen($this->country_code) >= 2);
        assert(!isset($this->country_code) || strlen($this->country_code) <= 2);
        assert(!isset($this->bic) || strlen($this->bic) >= 8);
        assert(!isset($this->bic) || strlen($this->bic) <= 11);
        assert(!isset($this->iban_last_chars) || strlen($this->iban_last_chars) >= 4);
        assert(!isset($this->iban_last_chars) || strlen($this->iban_last_chars) <= 34);
    }
}
