<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The error details. Required for client-side `4XX` errors.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-error_details.json
 */
class ErrorDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The field that caused the error. If this field is in the body, set this value to the field's JSON pointer
     * value. Required for client-side errors.
     */
    public $field;

    /**
     * @var string
     * The value of the field that caused the error.
     */
    public $value;

    /**
     * @var string
     * The location of the field that caused the error. Value is `body`, `path`, or `query`.
     */
    public $location;

    /**
     * @var string
     * The unique, fine-grained application-level error code.
     */
    public $issue;

    /**
     * @var string
     * The human-readable description for an issue. The description can change over the lifetime of an API, so
     * clients must not depend on this value.
     */
    public $description;
}
