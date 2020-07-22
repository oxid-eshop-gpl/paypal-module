<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The change reason response.
 *
 * generated from: response-disputes_change_reason.json
 */
class DisputesChangeReason implements JsonSerializable
{
    use BaseModel;

    /**
     * @var LinkDescription[]
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->links) || Assert::isArray($this->links, "links in DisputesChangeReason must be array $within");

                                if (isset($this->links)){
                                    foreach ($this->links as $item) {
                                        $item->validate(DisputesChangeReason::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
