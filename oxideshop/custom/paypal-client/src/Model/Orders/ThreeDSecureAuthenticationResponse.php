<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Results of 3D Secure Authentication.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-three_d_secure_authentication_response.json
 */
class ThreeDSecureAuthenticationResponse implements JsonSerializable
{
    use BaseModel;

    /** Successful authentication. */
    const AUTHENTICATION_STATUS_Y = 'Y';

    /** Failed authentication / account not verified / transaction denied. */
    const AUTHENTICATION_STATUS_N = 'N';

    /** Unable to complete authentication. */
    const AUTHENTICATION_STATUS_U = 'U';

    /** Successful attempts transaction. */
    const AUTHENTICATION_STATUS_A = 'A';

    /** Challenge required for authentication. */
    const AUTHENTICATION_STATUS_C = 'C';

    /** Authentication rejected (merchant must not submit for authorization). */
    const AUTHENTICATION_STATUS_R = 'R';

    /** Challenge required; decoupled authentication confirmed. */
    const AUTHENTICATION_STATUS_D = 'D';

    /** Informational only; 3DS requestor challenge preference acknowledged. */
    const AUTHENTICATION_STATUS_I = 'I';

    /** Yes. The bank is participating in 3-D Secure protocol and will return the ACSUrl. */
    const ENROLLMENT_STATUS_Y = 'Y';

    /** No. The bank is not participating in 3-D Secure protocol. */
    const ENROLLMENT_STATUS_N = 'N';

    /** Unavailable. The DS or ACS is not available for authentication at the time of the request. */
    const ENROLLMENT_STATUS_U = 'U';

    /** Bypass. The merchant authentication rule is triggered to bypass authentication. */
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
     * minLength: 1
     * maxLength: 255
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
     * minLength: 1
     * maxLength: 255
     */
    public $enrollment_status;

    public function validate()
    {
        assert(!isset($this->authentication_status) || strlen($this->authentication_status) >= 1);
        assert(!isset($this->authentication_status) || strlen($this->authentication_status) <= 255);
        assert(!isset($this->enrollment_status) || strlen($this->enrollment_status) >= 1);
        assert(!isset($this->enrollment_status) || strlen($this->enrollment_status) <= 255);
    }
}
