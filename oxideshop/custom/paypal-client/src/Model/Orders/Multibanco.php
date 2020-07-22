<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information used to pay using Multibanco.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-multibanco.json
 */
class Multibanco implements JsonSerializable
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

    public function validate()
    {
        assert(!isset($this->name) || strlen($this->name) >= 3);
        assert(!isset($this->name) || strlen($this->name) <= 300);
        assert(!isset($this->country_code) || strlen($this->country_code) >= 2);
        assert(!isset($this->country_code) || strlen($this->country_code) <= 2);
    }
}
