<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Results of 3D Secure Authentication.
 */
class ThreeDSecureAuthenticationResponse
{
	/** @var string */
	public $authentication_status;

	/** @var string */
	public $enrollment_status;
}
