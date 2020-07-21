<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * Information about the items in the transaction.
 */
class EligibilityRequestItem implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $category;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
