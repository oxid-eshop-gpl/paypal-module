<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * A merchant- or customer-submitted evidence document.
 */
class Evidence
{
	/** @var string */
	public $evidence_type;

	/** @var array */
	public $documents;

	/** @var string */
	public $notes;

	/** @var string */
	public $source;

	/** @var string */
	public $item_id;
}
