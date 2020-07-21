<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal REST endpoints.
 */
class RestApiIntegration implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $integration_method;

    /** @var string */
    public $integration_type;

    /** @var OxidProfessionalServices\PayPal\Api\Model\Partner\RestApiIntegrationFirstPartyDetails */
    public $first_party_details;

    /** @var OxidProfessionalServices\PayPal\Api\Model\Partner\RestApiIntegrationThirdPartyDetails */
    public $third_party_details;
}
