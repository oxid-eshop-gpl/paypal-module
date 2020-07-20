<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Results of 3D Secure Authentication.
 */
class ThreeDSecureAuthenticationResponse
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\ParesStatus */
	public $authentication_status;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Enrolled */
	public $enrollment_status;
}
