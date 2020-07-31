<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV4\LinkDescription;
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
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     *
     * @var LinkDescription[] | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in CreateReferralDataResponse must be array $within"
        );
        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(CreateReferralDataResponse::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['links'])) {
            $this->links = [];
            foreach ($data['links'] as $item) {
                $this->links[] = new LinkDescription($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
