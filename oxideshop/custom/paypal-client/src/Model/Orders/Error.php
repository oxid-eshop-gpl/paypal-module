<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The error details.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-error.json
 */
class Error implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The human-readable, unique name of the error.
     */
    public $name;

    /**
     * @var string
     * The message that describes the error.
     */
    public $message;

    /**
     * @var string
     * The PayPal internal ID. Used for correlation purposes.
     */
    public $debug_id;

    /**
     * @var string
     * The information link, or URI, that shows detailed information about this error for the developer.
     */
    public $information_link;

    /**
     * @var array<ErrorDetails>
     * An array of additional details about the error.
     */
    public $details;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->details) || Assert::isArray($this->details, "details in Error must be array $within");

                                if (isset($this->details)){
                                    foreach ($this->details as $item) {
                                        $item->validate(Error::class);
                                    }
                                }

        !isset($this->links) || Assert::isArray($this->links, "links in Error must be array $within");
    }

    public function __construct()
    {
    }
}
