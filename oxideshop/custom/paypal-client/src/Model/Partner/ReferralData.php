<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer's referral data that partners share with PayPal.
 *
 * generated from: referral_data-referral_data.json
 */
class ReferralData extends Account implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     */
    public $email;

    /**
     * @var string
     * The [language tag](https://tools.ietf.org/html/bcp47#section-2) for the language in which to localize the
     * error-related strings, such as messages, issues, and suggested actions. The tag is made up of the [ISO 639-2
     * language code](https://www.loc.gov/standards/iso639-2/php/code_list.php), the optional [ISO-15924 script
     * tag](https://www.unicode.org/iso15924/codelists.html), and the [ISO-3166 alpha-2 country
     * code](/docs/integration/direct/rest/country-codes/).
     */
    public $preferred_language_code;

    /** @var string */
    public $tracking_id;

    /**
     * @var PartnerConfigOverride
     * The preference to customize the web experience of the customer by overriding that is set at the Partner's
     * Account.
     */
    public $partner_config_override;

    /**
     * @var FinancialInstruments
     * Financial instruments attached to this account.
     */
    public $financial_instruments;

    /** @var array<Operation> */
    public $operations;

    /** @var array<string> */
    public $products;

    /** @var array<LegalConsent> */
    public $legal_consents;
}
