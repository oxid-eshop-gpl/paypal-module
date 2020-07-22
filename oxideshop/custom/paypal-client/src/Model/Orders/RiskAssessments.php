<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The risk assessment for a customer account, merchant account, or transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-risk_assessments.json
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payer) || Assert::isInstanceOf($this->payer, RiskAssessment::class, "payer in RiskAssessments must be instance of RiskAssessment $within");
        !isset($this->payer) || $this->payer->validate(RiskAssessments::class);
        !isset($this->payee) || Assert::isInstanceOf($this->payee, RiskAssessment::class, "payee in RiskAssessments must be instance of RiskAssessment $within");
        !isset($this->payee) || $this->payee->validate(RiskAssessments::class);
    }

    public function __construct()
    {
    }
}
