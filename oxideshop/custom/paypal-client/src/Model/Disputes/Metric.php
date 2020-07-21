<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * A metric.
 */
class Metric implements \JsonSerializable
{
    /** @var string */
    public $key;

    /** @var integer */
    public $count;

    /** @var array */
    public $amount;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
