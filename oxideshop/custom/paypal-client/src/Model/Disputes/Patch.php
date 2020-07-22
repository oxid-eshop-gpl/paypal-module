<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The JSON patch object to apply partial updates to resources.
 *
 * generated from: common_components-v3-schema-json-openapi-2.0-patch.json
 */
class Patch implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $op;

    /** @var string */
    public $path;

    /** @var number|integer|string|boolean|null|array|object */
    public $value;

    /** @var string */
    public $from;
}
