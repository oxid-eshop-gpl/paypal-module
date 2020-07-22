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
     */
    public $id;

    /**
     * @var string
     * The reason for recoup for the dispute.
     */
    public $reason;
}
