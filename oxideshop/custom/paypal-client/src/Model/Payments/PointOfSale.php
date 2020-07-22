<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The API caller-provided information about the store.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-point_of_sale.json
 */
class PointOfSale implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The API caller-provided external store identification number.
     */
    public $store_id;

    /**
     * @var string
     * The API caller-provided external terminal identification number.
     */
    public $terminal_id;
}
