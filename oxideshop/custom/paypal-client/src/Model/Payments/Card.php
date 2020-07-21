<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card to use to fund a payment. Can be a credit or debit card.
 */
class Card implements JsonSerializable
{
    use BaseModel;

    const CARD_TYPE_VISA = 'VISA';
    const CARD_TYPE_MASTERCARD = 'MASTERCARD';
    const CARD_TYPE_DISCOVER = 'DISCOVER';
    const CARD_TYPE_AMEX = 'AMEX';
    const CARD_TYPE_SOLO = 'SOLO';
    const CARD_TYPE_JCB = 'JCB';
    const CARD_TYPE_STAR = 'STAR';
    const CARD_TYPE_DELTA = 'DELTA';
    const CARD_TYPE_SWITCH = 'SWITCH';
    const CARD_TYPE_MAESTRO = 'MAESTRO';
    const CARD_TYPE_CB_NATIONALE = 'CB_NATIONALE';
    const CARD_TYPE_CONFIGOGA = 'CONFIGOGA';
    const CARD_TYPE_CONFIDIS = 'CONFIDIS';
    const CARD_TYPE_ELECTRON = 'ELECTRON';
    const CARD_TYPE_CETELEM = 'CETELEM';
    const CARD_TYPE_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $number;

    /**
     * @var string
     * The year and month, in ISO-8601 `YYYY-MM` date format. See [Internet date and time
     * format](https://tools.ietf.org/html/rfc3339#section-5.6).
     */
    public $expiry;

    /** @var string */
    public $security_code;

    /** @var string */
    public $last_digits;

    /**
     * @var string
     * The card network or brand. Applies to credit, debit, gift, and payment cards.
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

    /** @var array<ThreedsResult> */
    public $authentication_results;

    /**
     * @var CardAttributes
     * Additional attributes associated with the use of this card
     */
    public $attributes;
}
