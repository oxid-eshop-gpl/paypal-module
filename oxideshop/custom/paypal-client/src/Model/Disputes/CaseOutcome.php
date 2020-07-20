<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The outcome of the dispute case.
 */
class CaseOutcome
{
	/** @var string */
	public $faulty_party;

	/** @var string */
	public $adjudication_reason;
}
