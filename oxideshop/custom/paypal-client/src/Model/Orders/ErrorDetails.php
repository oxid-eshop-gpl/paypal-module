<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The error details. Required for client-side `4XX` errors.
 */
class ErrorDetails implements \JsonSerializable
{
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

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
