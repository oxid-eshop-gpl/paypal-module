<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information needed to pay using Sofort.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-sofort_request.json
 */
class SofortRequest implements JsonSerializable
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength($this->name, 3, "name in SofortRequest must have minlength of 3 $within");
        !isset($this->name) || Assert::maxLength($this->name, 300, "name in SofortRequest must have maxlength of 300 $within");
        !isset($this->country_code) || Assert::minLength($this->country_code, 2, "country_code in SofortRequest must have minlength of 2 $within");
        !isset($this->country_code) || Assert::maxLength($this->country_code, 2, "country_code in SofortRequest must have maxlength of 2 $within");
        !isset($this->bic) || Assert::minLength($this->bic, 8, "bic in SofortRequest must have minlength of 8 $within");
        !isset($this->bic) || Assert::maxLength($this->bic, 11, "bic in SofortRequest must have maxlength of 11 $within");
    }

    public function __construct()
    {
    }
}
