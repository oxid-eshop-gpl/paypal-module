<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The shared referral data.
 *
 * generated from: referral_data-create_referral_data_response.json
 */
class CreateReferralDataResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     */
    public $links;
}
