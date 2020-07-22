<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 9
     */
    public $reasons;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->reasons, "reasons in RiskAssessment must not be NULL $within");
         Assert::minCount($this->reasons, 0, "reasons in RiskAssessment must have min. count of 0 $within");
         Assert::maxCount($this->reasons, 9, "reasons in RiskAssessment must have max. count of 9 $within");
         Assert::isArray($this->reasons, "reasons in RiskAssessment must be array $within");
    }

    public function __construct()
    {
    }
}
