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

    const AUTHENTICATION_STATUS_Y = 'Y';
    const AUTHENTICATION_STATUS_N = 'N';
    const AUTHENTICATION_STATUS_U = 'U';
    const AUTHENTICATION_STATUS_A = 'A';
    const AUTHENTICATION_STATUS_C = 'C';
    const AUTHENTICATION_STATUS_R = 'R';
    const AUTHENTICATION_STATUS_D = 'D';
    const AUTHENTICATION_STATUS_I = 'I';
    const ENROLLMENT_STATUS_Y = 'Y';
    const ENROLLMENT_STATUS_N = 'N';
    const ENROLLMENT_STATUS_U = 'U';
    const ENROLLMENT_STATUS_B = 'B';

    /**
     * @var string
     * Transactions status result identifier. The outcome of the issuer's authentication.
     *
     * use one of constants defined in this class to set the value:
     * @see AUTHENTICATION_STATUS_Y
     * @see AUTHENTICATION_STATUS_N
     * @see AUTHENTICATION_STATUS_U
     * @see AUTHENTICATION_STATUS_A
     * @see AUTHENTICATION_STATUS_C
     * @see AUTHENTICATION_STATUS_R
     * @see AUTHENTICATION_STATUS_D
     * @see AUTHENTICATION_STATUS_I
     */
    public $authentication_status;

    /**
     * @var string
     * Status of Authentication eligibility.
     *
     * use one of constants defined in this class to set the value:
     * @see ENROLLMENT_STATUS_Y
     * @see ENROLLMENT_STATUS_N
     * @see ENROLLMENT_STATUS_U
     * @see ENROLLMENT_STATUS_B
     */
    public $enrollment_status;
}
