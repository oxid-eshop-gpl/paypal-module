<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The document-issuing authority information.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v4-schema-json-openapi-2.0-document_issuer.json
 */
class DocumentIssuer implements JsonSerializable
{
    use BaseModel;

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
     * The [state or province code that issued the identity document](/docs/integration/direct/rest/state-codes/), as
     * defined by [ISO 3166-2:2013](https://www.iso.org/standard/63546.html).
     *
     * minLength: 5
     * maxLength: 6
     */
    public $province_code;

    /**
     * @var string
     * The entity that issued the identity document. For example, `registration authority`.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $authority;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->country_code) || Assert::minLength($this->country_code, 2, "country_code in DocumentIssuer must have minlength of 2 $within");
        !isset($this->country_code) || Assert::maxLength($this->country_code, 2, "country_code in DocumentIssuer must have maxlength of 2 $within");
        !isset($this->province_code) || Assert::minLength($this->province_code, 5, "province_code in DocumentIssuer must have minlength of 5 $within");
        !isset($this->province_code) || Assert::maxLength($this->province_code, 6, "province_code in DocumentIssuer must have maxlength of 6 $within");
        !isset($this->authority) || Assert::minLength($this->authority, 1, "authority in DocumentIssuer must have minlength of 1 $within");
        !isset($this->authority) || Assert::maxLength($this->authority, 255, "authority in DocumentIssuer must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
