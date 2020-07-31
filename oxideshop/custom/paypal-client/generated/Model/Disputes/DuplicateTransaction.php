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
     * If `true`, indicates that a duplicate transaction was received.
     *
     * @var boolean | null
     */
    public $received_duplicate;

    /**
     * The information about the disputed transaction.
     *
     * @var TransactionInfo | null
     */
    public $original_transaction;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->original_transaction) || Assert::isInstanceOf(
            $this->original_transaction,
            TransactionInfo::class,
            "original_transaction in DuplicateTransaction must be instance of TransactionInfo $within"
        );
        !isset($this->original_transaction) ||  $this->original_transaction->validate(DuplicateTransaction::class);
    }

    private function map(array $data)
    {
        if (isset($data['received_duplicate'])) {
            $this->received_duplicate = $data['received_duplicate'];
        }
        if (isset($data['original_transaction'])) {
            $this->original_transaction = new TransactionInfo($data['original_transaction']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
