<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The error details.
 *
 * generated from: merchant_common_components-v1-schema-common_components-v3-schema-json-openapi-2.0-error.json
 */
class Error implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $message;

    /** @var string */
    public $debug_id;

    /** @var string */
    public $information_link;

    /** @var array<ErrorDetails> */
    public $details;

    /** @var array<array> */
    public $links;
}
