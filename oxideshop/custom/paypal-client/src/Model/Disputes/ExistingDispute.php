<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The dispute details.
 */
class ExistingDispute implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    /** @var string */
    public $reason;

    /** @var string */
    public $status;
}
