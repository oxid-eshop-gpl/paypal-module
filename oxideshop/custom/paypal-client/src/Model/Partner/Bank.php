<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The bank account information.
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

    /** @var string */
    public $currency_code;

    /** @var array<Identifier> */
    public $identifiers;

    /** @var AddressPortable */
    public $branch_location;

    /** @var Mandate */
    public $mandate;
}
