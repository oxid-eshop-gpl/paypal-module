<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The JSON patch object to apply partial updates to resources.
 *
 * generated from: common_components-v3-schema-json-openapi-2.0-patch.json
 */
class Patch implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The operation to complete.
     */
    public $op;

    /**
     * @var string
     * The JSON pointer to the target document location at which to complete the operation.
     */
    public $path;

    /**
     * @var number|integer|string|boolean|null|array|object
     * The value to apply. The `remove` operation does not require a value.
     */
    public $value;

    /**
     * @var string
     * The JSON pointer to the target document location from which to move the value. Required for the `move`
     * operation.
     */
    public $from;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    public function __construct()
    {
    }
}
