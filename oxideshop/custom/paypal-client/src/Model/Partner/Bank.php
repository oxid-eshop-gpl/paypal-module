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

    /** @var string */
    public $nick_name;

    /** @var string */
    public $account_number;

    /** @var string */
    public $account_type;

    /**
     * @var string
     * The [three-character ISO-4217 currency code](/docs/integration/direct/rest/currency-codes/) that identifies
     * the currency.
     */
    public $currency_code;

    /** @var array<Identifier> */
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
}
