<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card to use to fund a payment. Card can be a credit or debit card.
 */
class CardResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $last_n_chars;

    /** @var string */
    public $last_digits;

    /** @var string */
    public $brand;

    /** @var string */
    public $type;

    /** @var string */
    public $issuer;

    /** @var string */
    public $bin;
}
