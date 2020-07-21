<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Address and confirmation details.
 */
class AddressWithConfirmation extends \AddressName implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $confirmation_status;

    /** @var string */
    public $confirmation_authority;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
