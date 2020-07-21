<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

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
