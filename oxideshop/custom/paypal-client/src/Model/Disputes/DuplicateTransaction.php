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

    /**
     * @var boolean
     * If `true`, indicates that a duplicate transaction was received.
     */
    public $received_duplicate;

    /**
     * @var TransactionInfo
     * The information about the disputed transaction.
     */
    public $original_transaction;
}
