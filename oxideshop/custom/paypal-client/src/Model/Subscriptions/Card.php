<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-card.json
 */
class Card implements JsonSerializable
{
    use BaseModel;

    /** Visa card. */
    const CARD_TYPE_VISA = 'VISA';

    /** Mastecard card. */
    const CARD_TYPE_MASTERCARD = 'MASTERCARD';

    /** Discover card. */
    const CARD_TYPE_DISCOVER = 'DISCOVER';

    /** American Express card. */
    const CARD_TYPE_AMEX = 'AMEX';

    /** Solo debit card. */
    const CARD_TYPE_SOLO = 'SOLO';

    /** Japan Credit Bureau card. */
    const CARD_TYPE_JCB = 'JCB';

    /** Military Star card. */
    const CARD_TYPE_STAR = 'STAR';

    /** Delta Airlines card. */
    const CARD_TYPE_DELTA = 'DELTA';

    /** Switch credit card. */
    const CARD_TYPE_SWITCH = 'SWITCH';

    /** Maestro credit card. */
    const CARD_TYPE_MAESTRO = 'MAESTRO';

    /** Carte Bancaire (CB) credit card. */
    const CARD_TYPE_CB_NATIONALE = 'CB_NATIONALE';

    /** Configoga credit card. */
    const CARD_TYPE_CONFIGOGA = 'CONFIGOGA';

    /** Confidis credit card. */
    const CARD_TYPE_CONFIDIS = 'CONFIDIS';

    /** Visa Electron credit card. */
    const CARD_TYPE_ELECTRON = 'ELECTRON';

    /** Cetelem credit card. */
    const CARD_TYPE_CETELEM = 'CETELEM';

    /** China union pay credit card. */
    const CARD_TYPE_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /**
     * @var string
     * The PayPal-generated ID for the card.
     */
    public $id;

    /**
     * @var string
     * The card holder's name as it appears on the card.
     */
    public $name;

    /**
     * @var string
     * The primary account number (PAN) for the payment card.
     */
    public $number;

    /**
     * @var string
     * The year and month, in ISO-8601 `YYYY-MM` date format. See [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     */
    public $expiry;

    /**
     * @var string
     * The three- or four-digit security code of the card. Also known as the CVV, CVC, CVN, CVE, or CID.
     */
    public $security_code;

    /**
     * @var string
     * The last digits of the payment card.
     */
    public $last_digits;

    /**
     * @var string
     * The card network or brand. Applies to credit, debit, gift, and payment cards.
     *
     * use one of constants defined in this class to set the value:
     * @see CARD_TYPE_VISA
     * @see CARD_TYPE_MASTERCARD
     * @see CARD_TYPE_DISCOVER
     * @see CARD_TYPE_AMEX
     * @see CARD_TYPE_SOLO
     * @see CARD_TYPE_JCB
     * @see CARD_TYPE_STAR
     * @see CARD_TYPE_DELTA
     * @see CARD_TYPE_SWITCH
     * @see CARD_TYPE_MAESTRO
     * @see CARD_TYPE_CB_NATIONALE
     * @see CARD_TYPE_CONFIGOGA
     * @see CARD_TYPE_CONFIDIS
     * @see CARD_TYPE_ELECTRON
     * @see CARD_TYPE_CETELEM
     * @see CARD_TYPE_CHINA_UNION_PAY
     */
    public $card_type;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $billing_address;

    /**
     * @var array<ThreedsResult>
     * A list of authentication results.
     */
    public $authentication_results;
}
