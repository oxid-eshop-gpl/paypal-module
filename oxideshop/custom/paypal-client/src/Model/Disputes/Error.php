<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The error details.
 */
class Error implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var string */
    public $message;

    /** @var string */
    public $debug_id;

    /** @var string */
    public $information_link;

    /** @var array<ErrorDetails> */
    public $details;

    /** @var array<array> */
    public $links;
}
