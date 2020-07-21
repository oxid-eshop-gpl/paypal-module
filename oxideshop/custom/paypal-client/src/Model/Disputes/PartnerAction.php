<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

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
	public $create_time;

	/** @var string */
	public $update_time;

	/** @var string */
	public $due_time;

	/** @var string */
	public $status;

	/** @var Money */
	public $amount;
}
