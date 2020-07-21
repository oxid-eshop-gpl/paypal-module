<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The transaction for which to create a case.
 */
class Transaction implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var array */
    public $items;

    /** @var string */
    public $status;

    /** @var Money */
    public $gross_amount;

    /** @var string */
    public $create_time;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
