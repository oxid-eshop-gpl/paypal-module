<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Results of Authentication such as 3D Secure.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-authentication_response.json
 */
class AuthenticationResponse implements JsonSerializable
{
    use BaseModel;

    /** Liability has shifted to the card issuer. Available only after order is authorized or captured. */
    const LIABILITY_SHIFT_YES = 'YES';

    /** Liability is with the merchant. */
    const LIABILITY_SHIFT_NO = 'NO';

    /** Liability may shift to the card issuer. Available only before order is authorized or captured. */
    const LIABILITY_SHIFT_POSSIBLE = 'POSSIBLE';

    /** The authentication system is not available. */
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
     * minLength: 1
     * maxLength: 255
     */
    public $liability_shift;

    /**
     * @var ThreeDSecureAuthenticationResponse
     * Results of 3D Secure Authentication.
     */
    public $three_d_secure;

    public function validate()
    {
        assert(!isset($this->liability_shift) || strlen($this->liability_shift) >= 1);
        assert(!isset($this->liability_shift) || strlen($this->liability_shift) <= 255);
    }
}
