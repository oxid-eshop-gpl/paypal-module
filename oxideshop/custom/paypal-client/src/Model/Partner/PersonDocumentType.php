<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The type of documents.
 */
class PersonDocumentType implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
