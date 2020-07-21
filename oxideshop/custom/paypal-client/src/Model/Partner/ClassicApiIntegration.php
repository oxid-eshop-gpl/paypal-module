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

    /** @var OxidProfessionalServices\PayPal\Api\Model\Partner\ThirdPartyDetails */
    public $ThirdPartyDetails;

    /** @var string */
    public $first_party_details;
}
