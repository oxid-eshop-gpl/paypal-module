<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
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

    /** @var string */
    public $id;

    /** @var string */
    public $last_n_chars;

    /** @var string */
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
     */
    public $brand;

    /** @var string */
    public $type;

    /** @var string */
    public $issuer;

    /** @var string */
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
