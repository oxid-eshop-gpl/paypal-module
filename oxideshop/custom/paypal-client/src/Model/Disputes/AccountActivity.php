<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The information about the account-related activities.
 */
class AccountActivity implements JsonSerializable
{
    use BaseModel;

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

    /** @var array<ReversalAction> */
    public $reversal_actions;
}
