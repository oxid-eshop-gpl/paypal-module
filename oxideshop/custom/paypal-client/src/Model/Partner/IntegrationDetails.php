<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The integration details for the partner and customer relationship. Required if `operation` is
 * `API_INTEGRATION`.
 *
 * generated from: referral_data-integration_details.json
 */
class IntegrationDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ClassicApiIntegration
     * The integration details for PayPal CLASSIC endpoints.
     */
    public $classic_api_integration;

    /**
     * @var RestApiIntegration
     * The integration details for PayPal REST endpoints.
     */
    public $rest_api_integration;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->classic_api_integration) || Assert::isInstanceOf($this->classic_api_integration, ClassicApiIntegration::class, "classic_api_integration in IntegrationDetails must be instance of ClassicApiIntegration $within");
        !isset($this->classic_api_integration) || $this->classic_api_integration->validate(IntegrationDetails::class);
        !isset($this->rest_api_integration) || Assert::isInstanceOf($this->rest_api_integration, RestApiIntegration::class, "rest_api_integration in IntegrationDetails must be instance of RestApiIntegration $within");
        !isset($this->rest_api_integration) || $this->rest_api_integration->validate(IntegrationDetails::class);
    }

    public function __construct()
    {
    }
}
