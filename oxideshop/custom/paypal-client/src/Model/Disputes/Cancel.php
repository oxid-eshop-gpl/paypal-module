<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The cancel dispute request details.
 */
class Cancel implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $note;

    /** @var array */
    public $transaction_ids;

    /** @var string */
    public $cancellation_reason;
}
