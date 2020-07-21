<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A merchant request to acknowledge receipt of the disputed item that the customer returned.
 */
class AcknowledgeReturnItem implements \JsonSerializable
{
    /** @var string */
    public $note;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
