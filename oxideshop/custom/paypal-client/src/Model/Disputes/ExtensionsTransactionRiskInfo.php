<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The transaction risk information.
 *
 * generated from: Extensions_transaction_risk_info
 */
class ExtensionsTransactionRiskInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * @var boolean
     * Indicates whether the transaction is high risk and money must be recovered.
     */
    public $high_risk;

    /**
     * @var string
     * The recoup ID.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * @var string
     * The reason for recoup for the dispute.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $reason;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 1);
        assert(!isset($this->id) || strlen($this->id) <= 255);
        assert(!isset($this->reason) || strlen($this->reason) >= 1);
        assert(!isset($this->reason) || strlen($this->reason) <= 2000);
    }
}
