<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-card_response.json
 */
class CardResponse implements JsonSerializable
{
    use BaseModel;

    /** Visa card. */
    const BRAND_VISA = 'VISA';

    /** Mastecard card. */
    const BRAND_MASTERCARD = 'MASTERCARD';

    /** Discover card. */
    const BRAND_DISCOVER = 'DISCOVER';

    /** American Express card. */
    const BRAND_AMEX = 'AMEX';

    /** Solo debit card. */
    const BRAND_SOLO = 'SOLO';

    /** Japan Credit Bureau card. */
    const BRAND_JCB = 'JCB';

    /** Military Star card. */
    const BRAND_STAR = 'STAR';

    /** Delta Airlines card. */
    const BRAND_DELTA = 'DELTA';

    /** Switch credit card. */
    const BRAND_SWITCH = 'SWITCH';

    /** Maestro credit card. */
    const BRAND_MAESTRO = 'MAESTRO';

    /** Carte Bancaire (CB) credit card. */
    const BRAND_CB_NATIONALE = 'CB_NATIONALE';

    /** Configoga credit card. */
    const BRAND_CONFIGOGA = 'CONFIGOGA';

    /** Confidis credit card. */
    const BRAND_CONFIDIS = 'CONFIDIS';

    /** Visa Electron credit card. */
    const BRAND_ELECTRON = 'ELECTRON';

    /** Cetelem credit card. */
    const BRAND_CETELEM = 'CETELEM';

    /** China union pay credit card. */
    const BRAND_CHINA_UNION_PAY = 'CHINA_UNION_PAY';

    /** A credit card. */
    const TYPE_CREDIT = 'CREDIT';

    /** A debit card. */
    const TYPE_DEBIT = 'DEBIT';

    /** A Prepaid card. */
    const TYPE_PREPAID = 'PREPAID';

    /** Card type cannot be determined. */
    const TYPE_UNKNOWN = 'UNKNOWN';

    /** A PayPal credit card. */
    const ISSUER_PAYPAL = 'PAYPAL';

    /**
     * @var string
     * The PayPal-generated ID for the card.
     */
    public $id;

    /**
     * @var string
     * The last digits of the payment card.
     *
     * minLength: 2
     */
    public $last_n_chars;

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
     * @see BRAND_VISA
     * @see BRAND_MASTERCARD
     * @see BRAND_DISCOVER
     * @see BRAND_AMEX
     * @see BRAND_SOLO
     * @see BRAND_JCB
     * @see BRAND_STAR
     * @see BRAND_DELTA
     * @see BRAND_SWITCH
     * @see BRAND_MAESTRO
     * @see BRAND_CB_NATIONALE
     * @see BRAND_CONFIGOGA
     * @see BRAND_CONFIDIS
     * @see BRAND_ELECTRON
     * @see BRAND_CETELEM
     * @see BRAND_CHINA_UNION_PAY
     * minLength: 1
     * maxLength: 255
     */
    public $brand;

    /**
     * @var string
     * The payment card type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CREDIT
     * @see TYPE_DEBIT
     * @see TYPE_PREPAID
     * @see TYPE_UNKNOWN
     */
    public $type;

    /**
     * @var string
     * The issuer of the card instrument.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUER_PAYPAL
     */
    public $issuer;

    /**
     * @var string
     * An acronym for Bank Identification Number (BIN), also known as IIN (Issuer Identification Number). It Is a
     * standardized global numbering scheme (6 to 8 digits) used to identify a bank / institution that issued the
     * card.
     *
     * minLength: 6
     * maxLength: 8
     */
    public $bin;

    /**
     * @var AuthenticationResponse
     * Results of Authentication such as 3D Secure.
     */
    public $authentication_result;

    /**
     * @var CardAttributesResponse
     * Additional attributes associated with the use of this card.
     */
    public $attributes;
}
