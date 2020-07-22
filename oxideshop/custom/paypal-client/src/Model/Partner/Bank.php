<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The bank account information.
 *
 * generated from: referral_data-bank.json
 */
class Bank implements JsonSerializable
{
    use BaseModel;

    /** Checking account. */
    const ACCOUNT_TYPE_CHECKING = 'CHECKING';

    /** Savings account. */
    const ACCOUNT_TYPE_SAVINGS = 'SAVINGS';

    /**
     * @var string
     * The user-provided short name for the user's bank account.
     *
     * minLength: 1
     * maxLength: 50
     */
    public $nick_name;

    /**
     * @var string
     * The bank account number.
     *
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 50
     */
    public $account_number;

    /**
     * @var string
     * The type of bank account.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCOUNT_TYPE_CHECKING
     * @see ACCOUNT_TYPE_SAVINGS
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 50
     */
    public $account_type;

    /**
     * @var string
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     *
     * minLength: 3
     * maxLength: 3
     */
    public $currency_code;

    /**
     * @var array<Identifier>
     * An array of instrument institute attributes. Used with the account number to uniquely identify the instrument.
     * Value is:<ul><li>For banks with IBAN information, the IBAN number.</li><li>For banks with BBAN information,
     * the BBAN number.</li><li>For banks with both IBAN and BBAN information, the IBAN number.</li></ul>
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 20
     */
    public $identifiers;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $branch_location;

    /**
     * @var Mandate
     * Seller’s consent to operate on this financial instrument.
     */
    public $mandate;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->nick_name) || Assert::minLength($this->nick_name, 1, "nick_name in Bank must have minlength of 1 $within");
        !isset($this->nick_name) || Assert::maxLength($this->nick_name, 50, "nick_name in Bank must have maxlength of 50 $within");
        Assert::notNull($this->account_number, "account_number in Bank must not be NULL $within");
         Assert::minLength($this->account_number, 1, "account_number in Bank must have minlength of 1 $within");
         Assert::maxLength($this->account_number, 50, "account_number in Bank must have maxlength of 50 $within");
        Assert::notNull($this->account_type, "account_type in Bank must not be NULL $within");
         Assert::minLength($this->account_type, 1, "account_type in Bank must have minlength of 1 $within");
         Assert::maxLength($this->account_type, 50, "account_type in Bank must have maxlength of 50 $within");
        !isset($this->currency_code) || Assert::minLength($this->currency_code, 3, "currency_code in Bank must have minlength of 3 $within");
        !isset($this->currency_code) || Assert::maxLength($this->currency_code, 3, "currency_code in Bank must have maxlength of 3 $within");
        Assert::notNull($this->identifiers, "identifiers in Bank must not be NULL $within");
         Assert::minCount($this->identifiers, 0, "identifiers in Bank must have min. count of 0 $within");
         Assert::maxCount($this->identifiers, 20, "identifiers in Bank must have max. count of 20 $within");
         Assert::isArray($this->identifiers, "identifiers in Bank must be array $within");

                                if (isset($this->identifiers)){
                                    foreach ($this->identifiers as $item) {
                                        $item->validate(Bank::class);
                                    }
                                }

        !isset($this->branch_location) || Assert::isInstanceOf($this->branch_location, AddressPortable::class, "branch_location in Bank must be instance of AddressPortable $within");
        !isset($this->branch_location) || $this->branch_location->validate(Bank::class);
        !isset($this->mandate) || Assert::isInstanceOf($this->mandate, Mandate::class, "mandate in Bank must be instance of Mandate $within");
        !isset($this->mandate) || $this->mandate->validate(Bank::class);
    }

    public function __construct()
    {
    }
}
