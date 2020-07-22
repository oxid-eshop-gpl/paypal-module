<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The error details. Required for client-side `4XX` errors.
 *
 * generated from: common_components-v3-schema-json-openapi-2.0-error_details.json
 */
class ErrorDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The field that caused the error. If the field is in the body, set this value to the JSON pointer to that
     * field. Required for client-side errors.
     */
    public $field;

    /**
     * @var string
     * The value of the field that caused the error.
     */
    public $value;

    /**
     * @var string
     * The location of the field that caused the error. A valid value is `body`, `path`, or `query`. Default is
     * `body`.
     */
    public $location;

    /**
     * @var string
     * The unique and fine-grained application-level error code.
     */
    public $issue;

    /**
     * @var string
     * The human-readable description for an issue. The description MAY change over the lifetime of an API, so
     * clients **MUST NOT** depend on this value.
     */
    public $description;

    public function validate()
    {
    }
}
