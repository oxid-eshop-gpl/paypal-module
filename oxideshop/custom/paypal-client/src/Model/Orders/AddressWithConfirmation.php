<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Address and confirmation details.
 */
class AddressWithConfirmation extends AddressName implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $confirmation_status;

    /** @var string */
    public $confirmation_authority;
}
