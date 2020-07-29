<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The create dispute response.
 *
 * generated from: referred-dispute_create_response.json
 */
class DisputeCreateResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     *
     * @var LinkDescription[] | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in DisputeCreateResponse must be array $within"
        );

        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(DisputeCreateResponse::class);
            }
        }
    }

    public function __construct()
    {
    }
}
