<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details for the merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
 */
class PayeeBase implements \JsonSerializable
{
    /** @var string */
    public $email_address;

    /** @var string */
    public $merchant_id;

    /** @var string */
    public $client_id;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
