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

    /** @var boolean */
    public $high_risk;

    /** @var string */
    public $id;

    /** @var string */
    public $reason;
}
