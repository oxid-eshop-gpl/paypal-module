<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The supplementary data.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-supplementary_data.json
 */
class SupplementaryData implements JsonSerializable
{
    use BaseModel;

    /** @var array<AirlineItinerary> */
    public $airline;

    /**
     * @var PointOfSale
     * The API caller-provided information about the store.
     */
    public $point_of_sale;
}
