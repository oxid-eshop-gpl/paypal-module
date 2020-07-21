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

    const LIABILITY_SHIFT_YES = 'YES';
    const LIABILITY_SHIFT_NO = 'NO';
    const LIABILITY_SHIFT_POSSIBLE = 'POSSIBLE';
    const LIABILITY_SHIFT_UNKNOWN = 'UNKNOWN';

    /**
     * @var string
     * Liability shift indicator. The outcome of the issuer's authentication.
     *
     * use one of constants defined in this class to set the value:
     * @see LIABILITY_SHIFT_YES
     * @see LIABILITY_SHIFT_NO
     * @see LIABILITY_SHIFT_POSSIBLE
     * @see LIABILITY_SHIFT_UNKNOWN
     */
    public $liability_shift;

    /**
     * @var ThreeDSecureAuthenticationResponse
     * Results of 3D Secure Authentication.
     */
    public $three_d_secure;
}
