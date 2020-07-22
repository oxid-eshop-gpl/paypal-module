<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The JSON patch object to apply partial updates to resources.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-patch.json
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
