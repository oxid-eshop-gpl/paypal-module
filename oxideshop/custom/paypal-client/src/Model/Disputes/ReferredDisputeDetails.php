<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class ReferredDisputeDetails
{
	/** @var string */
	public $id;

	/** @var array */
	public $reference_disputes;

	/** @var array */
	public $evidences;

	/** @var array */
	public $messages;

	/** @var array */
	public $links;
}
