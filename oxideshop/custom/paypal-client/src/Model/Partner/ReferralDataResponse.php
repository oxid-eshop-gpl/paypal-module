<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The share referral data response.
 *
 * generated from: referral_data-referral_data_response.json
 */
class ReferralDataResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The ID to access the customer's data shared by the partner with PayPal.
     */
    public $partner_referral_id;

    /**
     * @var string
     * The payer ID of the partner who shared the referral data.
     */
    public $submitter_payer_id;

    /**
     * @var ReferralData
     * The customer's referral data that partners share with PayPal.
     */
    public $referral_data;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     */
    public $links;

    public function validate()
    {
        assert(isset($this->referral_data));
    }
}
