<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * The information about the account-related activities.
 */
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
