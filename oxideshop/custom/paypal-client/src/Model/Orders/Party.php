<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The properties of a party.
 */
class Party implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $external_id;

    /** @var boolean */
    public $primary;

    /** @var string */
    public $primary_email;

    /** @var array<string> */
    public $emails;

    /** @var array<PhoneInfo> */
    public $phones;

    /** @var array<AddressWithConfirmation> */
    public $addresses;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;
}
