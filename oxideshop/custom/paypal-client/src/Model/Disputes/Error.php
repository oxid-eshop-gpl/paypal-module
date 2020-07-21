<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The error details.
 */
class Error implements \JsonSerializable
{
    /** @var string */
    public $name;

    /** @var string */
    public $message;

    /** @var string */
    public $debug_id;

    /** @var string */
    public $information_link;

    /** @var array */
    public $details;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
