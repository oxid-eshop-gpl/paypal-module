<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The third-party claims properties.
 */
class ExternalCaseProperties
{
	/** @var string */
	public $reference_id;

	/** @var string */
	public $external_type;

	/** @var string */
	public $recovery_type;

	/** @var Money */
	public $reversal_fee;
}
