<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for a bank account that can be used to fund a payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-bank_account_response.json
 */
class BankAccountResponse implements JsonSerializable
{
    use BaseModel;

    /** A savings account. */
    const ACCOUNT_TYPE_SAVINGS = 'SAVINGS';

    /** A checking account. */
    const ACCOUNT_TYPE_CHECKING = 'CHECKING';

    /**
     * @var string
     * The PayPal-generated ID for the bank account.
     */
    public $id;

    /**
     * @var string
     * The last four digits of the bank account number.
     */
    public $last_n_chars;

    /**
     * @var string
     * The name of the bank to which the account is linked.
     *
     * maxLength: 64
     */
    public $bank_name;

    /**
     * @var string
     * The type of bank account.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCOUNT_TYPE_SAVINGS
     * @see ACCOUNT_TYPE_CHECKING
     */
    public $account_type;

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
     * @var BackupFundingInstrument
     * The backup funding instrument to use for payment when the primary instrument fails.
     */
    public $backup_funding_instrument;

    public function validate()
    {
        assert(!isset($this->bank_name) || strlen($this->bank_name) <= 64);
        assert(!isset($this->country_code) || strlen($this->country_code) >= 2);
        assert(!isset($this->country_code) || strlen($this->country_code) <= 2);
        assert(isset($this->backup_funding_instrument));
    }
}
