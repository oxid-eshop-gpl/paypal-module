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

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /** @var string */
    public $entity_type;

    /** @var string */
    public $entity_subtype;

    /** @var string */
    public $action_performed;

    /** @var string */
    public $entity_id;

    /**
     * @var ActivityEntityInfo
     * The date and time of the last known transaction or when other entity-related information was updated, in
     * [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     */
    public $activity_entity_info;

    /** @var array<ReversalAction> */
    public $reversal_actions;
}
