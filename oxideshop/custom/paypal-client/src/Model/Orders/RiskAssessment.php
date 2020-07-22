<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The risk assessment for a customer or merchant account or transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-risk_assessment.json
 */
class RiskAssessment implements JsonSerializable
{
    use BaseModel;

    /**
     * @var integer
     * The fine-grained numeric evaluation. Value is from `0` to `999`.
     */
    public $score;

    /**
     * @var array<string>
     * An array of risk assessment reasons.
     */
    public $reasons;
}
