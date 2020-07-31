<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV4\AddressPortable;
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
    public const ACCOUNT_TYPE_CHECKING = 'CHECKING';

    /** Savings account. */
    public const ACCOUNT_TYPE_SAVINGS = 'SAVINGS';

    /**
     * The user-provided short name for the user's bank account.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $nick_name;

    /**
     * The bank account number.
     *
     * @var string
     * minLength: 1
     * maxLength: 50
     */
    public $account_number;

    /**
     * The type of bank account.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCOUNT_TYPE_CHECKING
     * @see ACCOUNT_TYPE_SAVINGS
     * @var string
     * minLength: 1
     * maxLength: 50
     */
    public $account_type;

    /**
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 3
     */
    public $currency_code;

    /**
     * An array of instrument institute attributes. Used with the account number to uniquely identify the instrument.
     * Value is:<ul><li>For banks with IBAN information, the IBAN number.</li><li>For banks with BBAN information,
     * the BBAN number.</li><li>For banks with both IBAN and BBAN information, the IBAN number.</li></ul>
     *
     * @var Identifier[]
     * maxItems: 0
     * maxItems: 20
     */
    public $identifiers;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable | null
     */
    public $branch_location;

    /**
     * Seller’s consent to operate on this financial instrument.
     *
     * @var Mandate | null
     */
    public $mandate;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->nick_name) || Assert::minLength(
            $this->nick_name,
            1,
            "nick_name in Bank must have minlength of 1 $within"
        );
        !isset($this->nick_name) || Assert::maxLength(
            $this->nick_name,
            50,
            "nick_name in Bank must have maxlength of 50 $within"
        );
        Assert::notNull($this->account_number, "account_number in Bank must not be NULL $within");
        Assert::minLength(
            $this->account_number,
            1,
            "account_number in Bank must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->account_number,
            50,
            "account_number in Bank must have maxlength of 50 $within"
        );
        Assert::notNull($this->account_type, "account_type in Bank must not be NULL $within");
        Assert::minLength(
            $this->account_type,
            1,
            "account_type in Bank must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->account_type,
            50,
            "account_type in Bank must have maxlength of 50 $within"
        );
        !isset($this->currency_code) || Assert::minLength(
            $this->currency_code,
            3,
            "currency_code in Bank must have minlength of 3 $within"
        );
        !isset($this->currency_code) || Assert::maxLength(
            $this->currency_code,
            3,
            "currency_code in Bank must have maxlength of 3 $within"
        );
        Assert::notNull($this->identifiers, "identifiers in Bank must not be NULL $within");
        Assert::minCount(
            $this->identifiers,
            0,
            "identifiers in Bank must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->identifiers,
            20,
            "identifiers in Bank must have max. count of 20 $within"
        );
        Assert::isArray(
            $this->identifiers,
            "identifiers in Bank must be array $within"
        );
        if (isset($this->identifiers)) {
            foreach ($this->identifiers as $item) {
                $item->validate(Bank::class);
            }
        }
        !isset($this->branch_location) || Assert::isInstanceOf(
            $this->branch_location,
            AddressPortable::class,
            "branch_location in Bank must be instance of AddressPortable $within"
        );
        !isset($this->branch_location) ||  $this->branch_location->validate(Bank::class);
        !isset($this->mandate) || Assert::isInstanceOf(
            $this->mandate,
            Mandate::class,
            "mandate in Bank must be instance of Mandate $within"
        );
        !isset($this->mandate) ||  $this->mandate->validate(Bank::class);
    }

    private function map(array $data)
    {
        if (isset($data['nick_name'])) {
            $this->nick_name = $data['nick_name'];
        }
        if (isset($data['account_number'])) {
            $this->account_number = $data['account_number'];
        }
        if (isset($data['account_type'])) {
            $this->account_type = $data['account_type'];
        }
        if (isset($data['currency_code'])) {
            $this->currency_code = $data['currency_code'];
        }
        if (isset($data['identifiers'])) {
            $this->identifiers = [];
            foreach ($data['identifiers'] as $item) {
                $this->identifiers[] = new Identifier($item);
            }
        }
        if (isset($data['branch_location'])) {
            $this->branch_location = new AddressPortable($data['branch_location']);
        }
        if (isset($data['mandate'])) {
            $this->mandate = new Mandate($data['mandate']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->identifiers = [];
        if (isset($data)) { $this->map($data); }
    }
}
