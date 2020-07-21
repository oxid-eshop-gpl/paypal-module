<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * An uploaded document as a binary object that supports a dispute.
 */
class Document implements \JsonSerializable
{
    /** @var string */
    public $name;

    /** @var string */
    public $url;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
