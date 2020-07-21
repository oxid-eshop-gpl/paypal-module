<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Results of Authentication such as 3D Secure.
 */
class AuthenticationResponse
{
	/** @var string */
	public $liability_shift;

	/** @var ThreeDSecureAuthenticationResponse */
	public $three_d_secure;
}
