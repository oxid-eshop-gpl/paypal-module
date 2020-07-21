<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The risk assessment for a customer account, merchant account, or transaction.
 */
class RiskAssessments implements \JsonSerializable
{
    /** @var RiskAssessment */
    public $payer;

    /** @var RiskAssessment */
    public $payee;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
