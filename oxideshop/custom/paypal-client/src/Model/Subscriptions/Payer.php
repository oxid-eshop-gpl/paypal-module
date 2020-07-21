<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The customer who approves and pays for the order. The customer is also known as the payer.
 */
class Payer implements \JsonSerializable
{
    /** @var Name */
    public $name;

    /** @var string */
    public $email_address;

    /** @var string */
    public $payer_id;

    /** @var PhoneWithType */
    public $phone;

    /** @var string */
    public $birth_date;

    /** @var TaxInfo */
    public $tax_info;

    /** @var AddressPortable */
    public $address;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
