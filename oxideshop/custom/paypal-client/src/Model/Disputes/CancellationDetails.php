<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The cancellation details.
 */
class CancellationDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $cancellation_date;

    /** @var string */
    public $cancellation_number;

    /** @var boolean */
    public $cancelled;

    /** @var string */
    public $cancellation_mode;
}
