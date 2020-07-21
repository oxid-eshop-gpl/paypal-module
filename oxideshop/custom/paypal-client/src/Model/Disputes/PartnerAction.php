<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * A PayPal-requested or partner action for the dispute.
 */
class PartnerAction
{
	/** @var string */
	public $id;

	/** @var string */
	public $name;

	/** @var string */
	public $status;
}
