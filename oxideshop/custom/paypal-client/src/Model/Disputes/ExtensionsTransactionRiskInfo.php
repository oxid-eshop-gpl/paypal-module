<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in ExtensionsTransactionRiskInfo must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 255, "id in ExtensionsTransactionRiskInfo must have maxlength of 255 $within");
        !isset($this->reason) || Assert::minLength($this->reason, 1, "reason in ExtensionsTransactionRiskInfo must have minlength of 1 $within");
        !isset($this->reason) || Assert::maxLength($this->reason, 2000, "reason in ExtensionsTransactionRiskInfo must have maxlength of 2000 $within");
    }

    public function __construct()
    {
    }
}
