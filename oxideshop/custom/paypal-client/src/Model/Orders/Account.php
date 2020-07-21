<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Encapsulates the properties of user account.
 */
class Account implements JsonSerializable
{
    use BaseModel;

    const TIER_BUSINESS = 'BUSINESS';
    const TIER_PERSONAL = 'PERSONAL';
    const TIER_PREMIER = 'PREMIER';

    /** @var string */
    public $account_number;

    /**
     * @var string
     * The PayPal payer ID, which is a masked version of the PayPal account number intended for use with third
     * parties. The account number is reversibly encrypted and a proprietary variant of Base32 is used to encode the
     * result.
     */
    public $account_id;

    /**
     * @var string
     * Paypal account type.
     */
    public $tier;

    /** @var string */
    public $registration_type;

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     */
    public $legal_country_code;

    /** @var array */
    public $account_tags;

    /** @var string */
    public $status;

    /** @var string */
    public $pricing_category;

    /** @var string */
    public $legal_entity;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $time_created;
}
