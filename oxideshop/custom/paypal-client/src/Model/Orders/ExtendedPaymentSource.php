<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * A payment source that has additional authentication challenges.
 */
class ExtendedPaymentSource extends \PaymentSource
{
	/** @var array */
	public $contingencies;
}
