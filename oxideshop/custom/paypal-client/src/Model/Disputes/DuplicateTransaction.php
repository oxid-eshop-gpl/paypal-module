<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->original_transaction) || Assert::isInstanceOf($this->original_transaction, TransactionInfo::class, "original_transaction in DuplicateTransaction must be instance of TransactionInfo $within");
        !isset($this->original_transaction) || $this->original_transaction->validate(DuplicateTransaction::class);
    }

    public function __construct()
    {
    }
}
