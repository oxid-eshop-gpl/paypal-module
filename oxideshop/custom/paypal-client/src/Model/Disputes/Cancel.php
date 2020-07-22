<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The cancel dispute request details.
 *
 * generated from: request-cancel.json
 */
class Cancel implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $note;

    /** @var array */
    public $transaction_ids;

    /** @var string */
    public $cancellation_reason;
}
