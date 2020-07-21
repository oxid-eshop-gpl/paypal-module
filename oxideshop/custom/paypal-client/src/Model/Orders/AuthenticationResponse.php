<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Results of Authentication such as 3D Secure.
 */
class AuthenticationResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Liability shift indicator. The outcome of the issuer's authentication.
     */
    public $liability_shift;

    /**
     * @var ThreeDSecureAuthenticationResponse
     * Results of 3D Secure Authentication.
     */
    public $three_d_secure;
}
