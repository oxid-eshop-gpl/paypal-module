<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The risk assessment for a customer or merchant account or transaction.
 */
class RiskAssessment implements \JsonSerializable
{
    /** @var integer */
    public $score;

    /** @var array */
    public $reasons;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
