<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * A merchant- or customer-submitted supporting information.
 */
class SupportingInfo
{
	/** @var string */
	public $notes;

	/** @var array */
	public $documents;

	/** @var string */
	public $source;
}
