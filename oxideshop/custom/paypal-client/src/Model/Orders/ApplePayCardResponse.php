<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The Card from Apple Pay Wallet used to fund the payment
 */
class ApplePayCardResponse extends CardResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var AddressPortable */
    public $billing_address;

    /** @var string */
    public $country_code;
}
