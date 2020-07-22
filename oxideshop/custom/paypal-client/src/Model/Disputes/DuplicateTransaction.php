<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The duplicate transaction details.
 *
 * generated from: response-duplicate_transaction.json
 */
class DuplicateTransaction implements JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $received_duplicate;

    /**
     * @var TransactionInfo
     * The information about the disputed transaction.
     */
    public $original_transaction;
}
