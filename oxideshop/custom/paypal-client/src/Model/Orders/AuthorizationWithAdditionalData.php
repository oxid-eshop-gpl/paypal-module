<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The authorization with additional payment details, such as risk assessment and processor response. These
 * details are populated only for certain payment methods.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-authorization_with_additional_data.json
 */
class AuthorizationWithAdditionalData extends Authorization implements JsonSerializable
{
    use BaseModel;

    /**
     * @var RiskAssessments
     * The risk assessment for a customer account, merchant account, or transaction.
     */
    public $risk_assessment;

    /**
     * @var ProcessorResponse
     * The processor information. Might be required for payment requests, such as direct credit card transactions.
     */
    public $processor_response;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->risk_assessment) || Assert::isInstanceOf($this->risk_assessment, RiskAssessments::class, "risk_assessment in AuthorizationWithAdditionalData must be instance of RiskAssessments $within");
        !isset($this->risk_assessment) || $this->risk_assessment->validate(AuthorizationWithAdditionalData::class);
        !isset($this->processor_response) || Assert::isInstanceOf($this->processor_response, ProcessorResponse::class, "processor_response in AuthorizationWithAdditionalData must be instance of ProcessorResponse $within");
        !isset($this->processor_response) || $this->processor_response->validate(AuthorizationWithAdditionalData::class);
    }

    public function __construct()
    {
    }
}
