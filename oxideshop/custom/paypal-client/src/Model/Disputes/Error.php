<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The error details.
 *
 * generated from: common_components-v3-schema-json-openapi-2.0-error.json
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
     * The PayPal internal ID that is used for correlation purposes.
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
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     */
    public $links;
}