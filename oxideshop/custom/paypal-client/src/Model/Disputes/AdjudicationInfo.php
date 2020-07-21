<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The partner-provided details that were used for adjudication on the partner's side.
 */
class AdjudicationInfo
{
	/** @var Money */
	public $dispute_amount;

	/** @var array */
	public $items;

	/** @var Outcome */
	public $outcome;

	/** @var Extensions */
	public $extensions;

	/** @var array */
	public $evidences;

	/** @var string */
	public $dispute_reason;

	/** @var string */
	public $closure_reason;

	/** @var array */
	public $messages;
}
