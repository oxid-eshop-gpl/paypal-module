<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The error details. Required for client-side `4XX` errors.
 */
class ErrorDetails implements \JsonSerializable
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
