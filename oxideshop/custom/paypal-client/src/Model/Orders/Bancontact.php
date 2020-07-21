<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information used to pay Bancontact.
 */
class Bancontact implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $country_code;

    /** @var string */
    public $bic;

    /** @var string */
    public $iban_last_chars;

    /** @var string */
    public $card_last_digits;
}
