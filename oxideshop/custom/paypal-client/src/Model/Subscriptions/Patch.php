<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The JSON patch object to apply partial updates to resources.
 */
class Patch implements \JsonSerializable
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
