<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The supplementary data.
 */
class SupplementaryData implements JsonSerializable
{
    use BaseModel;

    /** @var array<AirlineItinerary> */
    public $airline;

    /** @var PointOfSale */
    public $point_of_sale;
}
