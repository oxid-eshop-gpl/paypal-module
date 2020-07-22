<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The shared referral data.
 *
 * generated from: referral_data-create_referral_data_response.json
 */
class CreateReferralDataResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var LinkDescription[]
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->links) || Assert::isArray($this->links, "links in CreateReferralDataResponse must be array $within");

                                if (isset($this->links)){
                                    foreach ($this->links as $item) {
                                        $item->validate(CreateReferralDataResponse::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
