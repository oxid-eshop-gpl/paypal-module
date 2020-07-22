<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
        assert(!isset($this->nick_name) || strlen($this->nick_name) >= 1);
        assert(!isset($this->nick_name) || strlen($this->nick_name) <= 50);
        assert(!isset($this->account_number) || strlen($this->account_number) >= 1);
        assert(!isset($this->account_number) || strlen($this->account_number) <= 50);
        assert(!isset($this->account_type) || strlen($this->account_type) >= 1);
        assert(!isset($this->account_type) || strlen($this->account_type) <= 50);
        assert(!isset($this->currency_code) || strlen($this->currency_code) >= 3);
        assert(!isset($this->currency_code) || strlen($this->currency_code) <= 3);
        assert(isset($this->branch_location));
        assert(isset($this->mandate));
    }
}
