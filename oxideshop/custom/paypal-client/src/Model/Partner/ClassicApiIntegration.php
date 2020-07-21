<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal CLASSIC endpoints.
 */
class ClassicApiIntegration implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $integration_type;

    /** @var OxidProfessionalServices\PayPal\Api\Model\Partner\ClassicApiIntegrationThirdPartyDetails */
    public $third_party_details;

    /** @var string */
    public $first_party_details;
}
