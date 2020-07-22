<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * this is mandatory to be set
     */
    public $id;

    /**
     * @var string
     * The last four digits of the bank account number.
     *
     * this is mandatory to be set
     */
    public $last_n_chars;

    /**
     * @var string
     * The name of the bank to which the account is linked.
     *
     * this is mandatory to be set
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
     * this is mandatory to be set
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * @var BackupFundingInstrument
     * The backup funding instrument to use for payment when the primary instrument fails.
     */
    public $backup_funding_instrument;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->id, "id in BankAccountResponse must not be NULL $within");
        Assert::notNull($this->last_n_chars, "last_n_chars in BankAccountResponse must not be NULL $within");
        Assert::notNull($this->bank_name, "bank_name in BankAccountResponse must not be NULL $within");
         Assert::maxLength($this->bank_name, 64, "bank_name in BankAccountResponse must have maxlength of 64 $within");
        Assert::notNull($this->country_code, "country_code in BankAccountResponse must not be NULL $within");
         Assert::minLength($this->country_code, 2, "country_code in BankAccountResponse must have minlength of 2 $within");
         Assert::maxLength($this->country_code, 2, "country_code in BankAccountResponse must have maxlength of 2 $within");
        !isset($this->backup_funding_instrument) || Assert::isInstanceOf($this->backup_funding_instrument, BackupFundingInstrument::class, "backup_funding_instrument in BankAccountResponse must be instance of BackupFundingInstrument $within");
        !isset($this->backup_funding_instrument) || $this->backup_funding_instrument->validate(BankAccountResponse::class);
    }

    public function __construct()
    {
    }
}
