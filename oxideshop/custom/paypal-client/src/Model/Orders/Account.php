<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Encapsulates the properties of user account.
 *
 * generated from: model-account.json
 */
class Account implements JsonSerializable
{
    use BaseModel;

    /** PayPal Business account. */
    const TIER_BUSINESS = 'BUSINESS';

    /** PayPal personal account. */
    const TIER_PERSONAL = 'PERSONAL';

    /** PayPal Premier account. */
    const TIER_PREMIER = 'PREMIER';

    /**
     * @var string
     * Unique account number.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $account_number;

    /**
     * @var string
     * The PayPal payer ID, which is a masked version of the PayPal account number intended for use with third
     * parties. The account number is reversibly encrypted and a proprietary variant of Base32 is used to encode the
     * result.
     *
     * minLength: 13
     * maxLength: 13
     */
    public $account_id;

    /**
     * @var string
     * Paypal account type.
     *
     * use one of constants defined in this class to set the value:
     * @see TIER_BUSINESS
     * @see TIER_PERSONAL
     * @see TIER_PREMIER
     * minLength: 1
     * maxLength: 100
     */
    public $tier;

    /**
     * @var string
     * The registration_type fields represents how the account was created. Currently supported values are FULL,
     * GUEST, ANONYMOUS. For more information about the meaning of each registration type, refer to the UserGuide.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $registration_type;

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
    public $legal_country_code;

    /**
     * @var string[]
     * Array of tags stored for the account in User domain by other clients Eg: YOUTH_ACCOUNT, RESTRICTED, WAX_USER,
     * MASSPAY_ENABLED etc.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 100
     */
    public $account_tags;

    /**
     * @var string
     * Status of account like OPEN, or CLOSED. For paypal accounts, the status is defined by User domain.
     *
     * minLength: 1
     * maxLength: 30
     */
    public $status;

    /**
     * @var string
     * Pricing category for the account as defined by PalPal pricing.
     *
     * minLength: 1
     * maxLength: 30
     */
    public $pricing_category;

    /**
     * @var string
     * The account's legal PayPal entity Eg: INC, EUROPE, CHINA etc. For paypal accounts, it is defined by User
     * domain.
     *
     * minLength: 1
     * maxLength: 30
     */
    public $legal_entity;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $time_created;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->account_number) || Assert::minLength($this->account_number, 1, "account_number in Account must have minlength of 1 $within");
        !isset($this->account_number) || Assert::maxLength($this->account_number, 20, "account_number in Account must have maxlength of 20 $within");
        !isset($this->account_id) || Assert::minLength($this->account_id, 13, "account_id in Account must have minlength of 13 $within");
        !isset($this->account_id) || Assert::maxLength($this->account_id, 13, "account_id in Account must have maxlength of 13 $within");
        !isset($this->tier) || Assert::minLength($this->tier, 1, "tier in Account must have minlength of 1 $within");
        !isset($this->tier) || Assert::maxLength($this->tier, 100, "tier in Account must have maxlength of 100 $within");
        !isset($this->registration_type) || Assert::minLength($this->registration_type, 1, "registration_type in Account must have minlength of 1 $within");
        !isset($this->registration_type) || Assert::maxLength($this->registration_type, 255, "registration_type in Account must have maxlength of 255 $within");
        !isset($this->legal_country_code) || Assert::minLength($this->legal_country_code, 2, "legal_country_code in Account must have minlength of 2 $within");
        !isset($this->legal_country_code) || Assert::maxLength($this->legal_country_code, 2, "legal_country_code in Account must have maxlength of 2 $within");
        Assert::notNull($this->account_tags, "account_tags in Account must not be NULL $within");
         Assert::minCount($this->account_tags, 1, "account_tags in Account must have min. count of 1 $within");
         Assert::maxCount($this->account_tags, 100, "account_tags in Account must have max. count of 100 $within");
         Assert::isArray($this->account_tags, "account_tags in Account must be array $within");
        !isset($this->status) || Assert::minLength($this->status, 1, "status in Account must have minlength of 1 $within");
        !isset($this->status) || Assert::maxLength($this->status, 30, "status in Account must have maxlength of 30 $within");
        !isset($this->pricing_category) || Assert::minLength($this->pricing_category, 1, "pricing_category in Account must have minlength of 1 $within");
        !isset($this->pricing_category) || Assert::maxLength($this->pricing_category, 30, "pricing_category in Account must have maxlength of 30 $within");
        !isset($this->legal_entity) || Assert::minLength($this->legal_entity, 1, "legal_entity in Account must have minlength of 1 $within");
        !isset($this->legal_entity) || Assert::maxLength($this->legal_entity, 30, "legal_entity in Account must have maxlength of 30 $within");
        !isset($this->time_created) || Assert::minLength($this->time_created, 20, "time_created in Account must have minlength of 20 $within");
        !isset($this->time_created) || Assert::maxLength($this->time_created, 64, "time_created in Account must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
