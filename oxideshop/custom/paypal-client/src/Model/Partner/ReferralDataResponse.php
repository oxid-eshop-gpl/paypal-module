<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 2
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->referral_data) || Assert::isInstanceOf($this->referral_data, ReferralData::class, "referral_data in ReferralDataResponse must be instance of ReferralData $within");
        !isset($this->referral_data) || $this->referral_data->validate(ReferralDataResponse::class);
        Assert::notNull($this->links, "links in ReferralDataResponse must not be NULL $within");
         Assert::minCount($this->links, 0, "links in ReferralDataResponse must have min. count of 0 $within");
         Assert::maxCount($this->links, 2, "links in ReferralDataResponse must have max. count of 2 $within");
         Assert::isArray($this->links, "links in ReferralDataResponse must be array $within");
    }

    public function __construct()
    {
    }
}
