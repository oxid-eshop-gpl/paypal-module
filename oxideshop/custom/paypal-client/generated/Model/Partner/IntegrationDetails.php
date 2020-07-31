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
     * The integration details for PayPal CLASSIC endpoints.
     *
     * @var ClassicApiIntegration | null
     */
    public $classic_api_integration;

    /**
     * The integration details for PayPal REST endpoints.
     *
     * @var RestApiIntegration | null
     */
    public $rest_api_integration;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->classic_api_integration) || Assert::isInstanceOf(
            $this->classic_api_integration,
            ClassicApiIntegration::class,
            "classic_api_integration in IntegrationDetails must be instance of ClassicApiIntegration $within"
        );
        !isset($this->classic_api_integration) ||  $this->classic_api_integration->validate(IntegrationDetails::class);
        !isset($this->rest_api_integration) || Assert::isInstanceOf(
            $this->rest_api_integration,
            RestApiIntegration::class,
            "rest_api_integration in IntegrationDetails must be instance of RestApiIntegration $within"
        );
        !isset($this->rest_api_integration) ||  $this->rest_api_integration->validate(IntegrationDetails::class);
    }

    private function map(array $data)
    {
        if (isset($data['classic_api_integration'])) {
            $this->classic_api_integration = new ClassicApiIntegration($data['classic_api_integration']);
        }
        if (isset($data['rest_api_integration'])) {
            $this->rest_api_integration = new RestApiIntegration($data['rest_api_integration']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
