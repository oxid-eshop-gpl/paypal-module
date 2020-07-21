<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for the partner and customer relationship. Required if `operation` is
 * `API_INTEGRATION`.
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
}
