<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

class ProcessorResponse
{
	/** @var string */
	public $avs_code;

	/** @var string */
	public $cvv_code;

	/** @var string */
	public $response_code;

	/** @var string */
	public $payment_advice_code;
}
