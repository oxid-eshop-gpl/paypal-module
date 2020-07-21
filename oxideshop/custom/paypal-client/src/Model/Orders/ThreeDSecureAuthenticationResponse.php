<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Results of 3D Secure Authentication.
 */
class ThreeDSecureAuthenticationResponse implements \JsonSerializable
{
    /** @var string */
    public $authentication_status;

    /** @var string */
    public $enrollment_status;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
