<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The supplementary data.
 */
class SupplementaryData implements \JsonSerializable
{
    /** @var array */
    public $airline;

    /** @var PointOfSale */
    public $point_of_sale;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
