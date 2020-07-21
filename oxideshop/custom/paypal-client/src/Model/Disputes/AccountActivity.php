<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

class AccountActivity
{
	/** @var string */
	public $id;

	/** @var string */
	public $entity_type;

	/** @var string */
	public $entity_subtype;

	/** @var string */
	public $action_performed;

	/** @var string */
	public $entity_id;

	/** @var array */
	public $reversal_actions;
}
