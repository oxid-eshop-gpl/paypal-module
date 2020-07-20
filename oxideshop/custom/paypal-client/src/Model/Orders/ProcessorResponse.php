<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The processor information. Might be required for payment requests, such as direct credit card transactions.
 */
class ProcessorResponse
{
	public $avs_code;
	public $cvv_code;
	public $response_code;
	public $payment_advice_code;
}
