<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The transaction risk information.
 */
class ExtensionsTransactionRiskInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $high_risk;

    /** @var string */
    public $id;

    /** @var string */
    public $reason;
}
