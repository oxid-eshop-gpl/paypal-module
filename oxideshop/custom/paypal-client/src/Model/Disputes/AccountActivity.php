<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The information about the account-related activities.
 */
class AccountActivity implements \JsonSerializable
{
	/** @var string */
	public $id;

	/** @var string */
	public $create_time;

	/** @var string */
	public $entity_type;

	/** @var string */
	public $entity_subtype;

	/** @var string */
	public $action_performed;

	/** @var string */
	public $entity_id;

	/** @var ActivityEntityInfo */
	public $activity_entity_info;

	/** @var array */
	public $reversal_actions;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
