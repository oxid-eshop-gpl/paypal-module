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

    /**
     * @var string
     * Transactions status result identifier. The outcome of the issuer's authentication.
     */
    public $authentication_status;

    /**
     * @var string
     * Status of Authentication eligibility.
     */
    public $enrollment_status;
}
