<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Information needed to pay using Verkkopankki (Finnish Online Banking).
 */
class VerkkopankkiRequest implements \JsonSerializable
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $country_code;

    /** @var string */
    public $bank_id;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
