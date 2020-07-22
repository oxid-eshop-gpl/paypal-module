<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $name;

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     */
    public $country_code;

    /**
     * @var string
     * The business identification code (BIC). In payments systems, a BIC is used to identify a specific business,
     * most commonly a bank
     */
    public $bic;
}