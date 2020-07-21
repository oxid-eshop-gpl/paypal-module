<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
 */
class CardResponse implements JsonSerializable
{
    use BaseModel;

    const BRAND_VISA = 'VISA';
    const BRAND_MASTERCARD = 'MASTERCARD';
    const BRAND_DISCOVER = 'DISCOVER';
    const BRAND_AMEX = 'AMEX';
    const BRAND_SOLO = 'SOLO';
    const BRAND_JCB = 'JCB';
    const BRAND_STAR = 'STAR';
    const BRAND_DELTA = 'DELTA';
    const BRAND_SWITCH = 'SWITCH';
    const BRAND_MAESTRO = 'MAESTRO';
    const BRAND_CB_NATIONALE = 'CB_NATIONALE';
    const BRAND_CONFIGOGA = 'CONFIGOGA';
    const BRAND_CONFIDIS = 'CONFIDIS';
    const BRAND_ELECTRON = 'ELECTRON';
    const BRAND_CETELEM = 'CETELEM';
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
     */
    public $brand;

    /** @var string */
    public $type;

    /** @var string */
    public $issuer;

    /** @var string */
    public $bin;
}
