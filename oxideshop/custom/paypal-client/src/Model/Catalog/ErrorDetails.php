<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The error details. Required for client-side `4XX` errors.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-error_details.json
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
    public $location = 'body';

    /**
     * @var string
     * The unique, fine-grained application-level error code.
     *
     * this is mandatory to be set
     */
    public $issue;

    /**
     * @var string
     * The human-readable description for an issue. The description can change over the lifetime of an API, so
     * clients must not depend on this value.
     */
    public $description;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->issue, "issue in ErrorDetails must not be NULL $within");
    }

    public function __construct()
    {
    }
}
