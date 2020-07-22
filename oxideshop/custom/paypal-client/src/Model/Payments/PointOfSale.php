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

    /** @var string */
    public $store_id;

    /** @var string */
    public $terminal_id;
}
