<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The system action that reverses the impact of the unauthorized event. Includes the system-defined details of the reversal action.
 */
class ReversalAction
{
	/** @var string */
	public $id;

	/** @var string */
	public $original_activity_id;

	/** @var string */
	public $entity_type;

	/** @var string */
	public $entity_subtype;

	/** @var string */
	public $action_performed;

	/** @var string */
	public $status;
}
