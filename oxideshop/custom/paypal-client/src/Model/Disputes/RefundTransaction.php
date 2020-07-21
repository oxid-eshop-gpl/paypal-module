<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund transaction.
 */
class RefundTransaction implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $status;

    /** @var Money */
    public $gross_amount;

    /** @var string */
    public $create_time;
}
