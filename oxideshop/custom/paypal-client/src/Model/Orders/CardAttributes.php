<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Additional attributes associated with the use of this card
 */
class CardAttributes
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Customer */
	public $customer;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CardVerification */
	public $verification;
}
