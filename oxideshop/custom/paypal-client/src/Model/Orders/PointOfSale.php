<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The API caller-provided information about the store.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-point_of_sale.json
 */
class PointOfSale implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The API caller-provided external store identification number.
     *
     * minLength: 1
     * maxLength: 50
     */
    public $store_id;

    /**
     * @var string
     * The API caller-provided external terminal identification number.
     *
     * minLength: 1
     * maxLength: 50
     */
    public $terminal_id;

    public function validate()
    {
        assert(!isset($this->store_id) || strlen($this->store_id) >= 1);
        assert(!isset($this->store_id) || strlen($this->store_id) <= 50);
        assert(!isset($this->terminal_id) || strlen($this->terminal_id) >= 1);
        assert(!isset($this->terminal_id) || strlen($this->terminal_id) <= 50);
    }
}
