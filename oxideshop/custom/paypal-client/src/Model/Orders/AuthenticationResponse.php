<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Results of Authentication such as 3D Secure.
 */
class AuthenticationResponse
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\LiabilityShift */
	public $liability_shift;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\ThreeDSecureAuthenticationResponse */
	public $three_d_secure;
}
