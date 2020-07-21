<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The duplicate transaction details.
 */
class DuplicateTransaction implements \JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $received_duplicate;

    /** @var TransactionInfo */
    public $original_transaction;
}
