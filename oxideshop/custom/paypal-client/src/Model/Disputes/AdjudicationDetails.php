<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The partner-provided details that were used for adjudication on the partner's side.
 */
class AdjudicationDetails
{
	/** @var array */
	public $items;

	/** @var array */
	public $evidences;

	/** @var string */
	public $closure_reason;

	/** @var array */
	public $messages;
}
