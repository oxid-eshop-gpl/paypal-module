<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The API caller-provided information about the store.
 */
class PointOfSale implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $store_id;

    /** @var string */
    public $terminal_id;
}
