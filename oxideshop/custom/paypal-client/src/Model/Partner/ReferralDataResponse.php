<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The share referral data response.
 */
class ReferralDataResponse implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $partner_referral_id;

    /** @var string */
    public $submitter_payer_id;

    /**
     * @var ReferralData
     * The customer's referral data that partners share with PayPal.
     */
    public $referral_data;

    /** @var array<array> */
    public $links;
}
