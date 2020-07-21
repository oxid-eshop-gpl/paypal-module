<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The supplementary data.
 */
class SupplementaryData implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $airline;

    /** @var PointOfSale */
    public $point_of_sale;
}
