<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The risk assessment for a customer account, merchant account, or transaction.
 */
class RiskAssessments implements JsonSerializable
{
    use BaseModel;

    /**
     * @var RiskAssessment
     * The risk assessment for a customer or merchant account or transaction.
     */
    public $payer;

    /**
     * @var RiskAssessment
     * The risk assessment for a customer or merchant account or transaction.
     */
    public $payee;
}
