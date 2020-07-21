<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * Status of Authentication eligibility.
 */
class Enrolled implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
