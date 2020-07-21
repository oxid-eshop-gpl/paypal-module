<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The risk assessment for a customer account, merchant account, or transaction.
 */
class RiskAssessments implements \JsonSerializable
{
    use BaseModel;

    /** @var RiskAssessment */
    public $payer;

    /** @var RiskAssessment */
    public $payee;
}
