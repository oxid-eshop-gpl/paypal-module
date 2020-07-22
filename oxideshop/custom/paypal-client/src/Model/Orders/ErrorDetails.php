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

    /** @var string */
    public $field;

    /** @var string */
    public $value;

    /** @var string */
    public $location;

    /** @var string */
    public $issue;

    /** @var string */
    public $description;
}
