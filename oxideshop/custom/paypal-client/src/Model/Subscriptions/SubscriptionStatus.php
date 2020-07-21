<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subscription status details.
 */
class SubscriptionStatus implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $status;

    /** @var string */
    public $status_change_note;

    /** @var string */
    public $status_update_time;

    /** @var string */
    public $status_changed_by;
}
