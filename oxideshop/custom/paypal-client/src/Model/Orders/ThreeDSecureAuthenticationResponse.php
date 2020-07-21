<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Results of 3D Secure Authentication.
 */
class ThreeDSecureAuthenticationResponse implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $authentication_status;

    /** @var string */
    public $enrollment_status;
}
