<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Basic vault instruction specification that can be extended by specific payment sources that supports vaulting.
 */
class VaultInstructionBase
{
	/** @var string */
	public $confirm_payment_token;
}
