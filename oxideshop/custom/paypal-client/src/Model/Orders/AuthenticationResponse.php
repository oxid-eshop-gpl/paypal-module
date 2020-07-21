<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Results of Authentication such as 3D Secure.
 */
class AuthenticationResponse implements \JsonSerializable
{
    /** @var string */
    public $liability_shift;

    /** @var ThreeDSecureAuthenticationResponse */
    public $three_d_secure;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
