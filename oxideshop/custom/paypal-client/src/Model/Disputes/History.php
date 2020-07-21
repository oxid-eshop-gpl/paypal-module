<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The history of the dispute.
 */
class History implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $date;

    /** @var string */
    public $actor;

    /** @var string */
    public $event_type;
}
