<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Additional attributes associated with the use of this card
 */
class CardAttributes
{
	/** @var Customer */
	public $customer;

	/** @var CardVerification */
	public $verification;
}
