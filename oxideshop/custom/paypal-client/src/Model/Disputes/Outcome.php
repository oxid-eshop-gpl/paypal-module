<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The outcome of the dispute case.
 */
class Outcome
{
	/** @var string */
	public $faulty_party;

	/** @var string */
	public $adjudication_reason;

	/** @var string */
	public $resolution_date;
}
