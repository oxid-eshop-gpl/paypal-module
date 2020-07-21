<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The dispute details.
 */
class ReferredDispute
{
	/** @var string */
	public $dispute_id;

	/** @var array */
	public $reference_disputes;

	/** @var string */
	public $dispute_flow;

	/** @var array */
	public $links;
}
