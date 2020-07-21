<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The dispute details.
 */
class ExistingDispute
{
	/** @var string */
	public $id;

	/** @var string */
	public $create_time;

	/** @var string */
	public $update_time;

	/** @var string */
	public $reason;

	/** @var string */
	public $status;
}
