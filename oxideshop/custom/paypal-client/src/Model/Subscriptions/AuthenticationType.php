<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * Indicates the type of authentication that was used to challenge the card holder.
 */
class AuthenticationType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
