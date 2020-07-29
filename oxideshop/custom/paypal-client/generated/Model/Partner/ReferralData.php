<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer's referral data that partners share with PayPal.
 *
 * generated from: referral_data-referral_data.json
 */
class ReferralData extends Account implements JsonSerializable
{
    use BaseModel;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * The [language tag](https://tools.ietf.org/html/bcp47#section-2) for the language in which to localize the
     * error-related strings, such as messages, issues, and suggested actions. The tag is made up of the [ISO 639-2
     * language code](https://www.loc.gov/standards/iso639-2/php/code_list.php), the optional [ISO-15924 script
     * tag](https://www.unicode.org/iso15924/codelists.html), and the [ISO-3166 alpha-2 country
     * code](/docs/integration/direct/rest/country-codes/).
     *
     * @var string | null
     * minLength: 2
     * maxLength: 10
     */
    public $preferred_language_code;

    /**
     * The partner's unique identifier for this customer in their system which can be used to track user in PayPal.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $tracking_id;

    /**
     * The preference to customize the web experience of the customer by overriding that is set at the Partner's
     * Account.
     *
     * @var PartnerConfigOverride | null
     */
    public $partner_config_override;

    /**
     * Financial instruments attached to this account.
     *
     * @var FinancialInstruments | null
     */
    public $financial_instruments;

    /**
     * An array of operations to perform for the customer while they share their data.
     *
     * @var Operation[]
     * maxItems: 1
     * maxItems: 5
     */
    public $operations;

    /**
     * An array of PayPal products to which the partner wants to onboard the customer.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 1
     */
    public $products;

    /**
     * An array of all consents that the partner has received from this seller. If `SHARE_DATA_CONSENT` is not
     * granted, PayPal does not store customer data.
     *
     * @var LegalConsent[]
     * maxItems: 1
     * maxItems: 5
     */
    public $legal_consents;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->email, "email in ReferralData must not be NULL $within");
        Assert::minLength(
            $this->email,
            3,
            "email in ReferralData must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->email,
            254,
            "email in ReferralData must have maxlength of 254 $within"
        );
        !isset($this->preferred_language_code) || Assert::minLength(
            $this->preferred_language_code,
            2,
            "preferred_language_code in ReferralData must have minlength of 2 $within"
        );
        !isset($this->preferred_language_code) || Assert::maxLength(
            $this->preferred_language_code,
            10,
            "preferred_language_code in ReferralData must have maxlength of 10 $within"
        );
        !isset($this->tracking_id) || Assert::minLength(
            $this->tracking_id,
            1,
            "tracking_id in ReferralData must have minlength of 1 $within"
        );
        !isset($this->tracking_id) || Assert::maxLength(
            $this->tracking_id,
            127,
            "tracking_id in ReferralData must have maxlength of 127 $within"
        );
        !isset($this->partner_config_override) || Assert::isInstanceOf(
            $this->partner_config_override,
            PartnerConfigOverride::class,
            "partner_config_override in ReferralData must be instance of PartnerConfigOverride $within"
        );
        !isset($this->partner_config_override) ||  $this->partner_config_override->validate(ReferralData::class);
        !isset($this->financial_instruments) || Assert::isInstanceOf(
            $this->financial_instruments,
            FinancialInstruments::class,
            "financial_instruments in ReferralData must be instance of FinancialInstruments $within"
        );
        !isset($this->financial_instruments) ||  $this->financial_instruments->validate(ReferralData::class);
        Assert::notNull($this->operations, "operations in ReferralData must not be NULL $within");
        Assert::minCount(
            $this->operations,
            1,
            "operations in ReferralData must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->operations,
            5,
            "operations in ReferralData must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->operations,
            "operations in ReferralData must be array $within"
        );

        if (isset($this->operations)) {
            foreach ($this->operations as $item) {
                $item->validate(ReferralData::class);
            }
        }

        Assert::notNull($this->products, "products in ReferralData must not be NULL $within");
        Assert::minCount(
            $this->products,
            1,
            "products in ReferralData must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->products,
            1,
            "products in ReferralData must have max. count of 1 $within"
        );
        Assert::isArray(
            $this->products,
            "products in ReferralData must be array $within"
        );
        Assert::notNull($this->legal_consents, "legal_consents in ReferralData must not be NULL $within");
        Assert::minCount(
            $this->legal_consents,
            1,
            "legal_consents in ReferralData must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->legal_consents,
            5,
            "legal_consents in ReferralData must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->legal_consents,
            "legal_consents in ReferralData must be array $within"
        );

        if (isset($this->legal_consents)) {
            foreach ($this->legal_consents as $item) {
                $item->validate(ReferralData::class);
            }
        }
    }

    public function __construct()
    {
        $this->operations = [];
        $this->products = [];
        $this->legal_consents = [];
    }
}
