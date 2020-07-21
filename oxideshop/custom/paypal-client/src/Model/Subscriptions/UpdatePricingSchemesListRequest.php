<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The update pricing scheme request details.
 */
class UpdatePricingSchemesListRequest implements \JsonSerializable
{
    /** @var array */
    public $pricing_schemes;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
