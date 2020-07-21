<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The platform or partner fee, commission, or brokerage fee that is associated with the transaction. Not a separate or isolated transaction leg from the external perspective. The platform fee is limited in scope and is always associated with the original payment for the purchase unit.
 */
class PlatformFee
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Money */
	public $amount;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PayeeBase */
	public $payee;
}
