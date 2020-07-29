<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The API caller-provided information about the store.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-point_of_sale.json
 */
class PointOfSale implements JsonSerializable
{
    use BaseModel;

    /**
     * The API caller-provided external store identification number.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $store_id;

    /**
     * The API caller-provided external terminal identification number.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 50
     */
    public $terminal_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->store_id) || Assert::minLength(
            $this->store_id,
            1,
            "store_id in PointOfSale must have minlength of 1 $within"
        );
        !isset($this->store_id) || Assert::maxLength(
            $this->store_id,
            50,
            "store_id in PointOfSale must have maxlength of 50 $within"
        );
        !isset($this->terminal_id) || Assert::minLength(
            $this->terminal_id,
            1,
            "terminal_id in PointOfSale must have minlength of 1 $within"
        );
        !isset($this->terminal_id) || Assert::maxLength(
            $this->terminal_id,
            50,
            "terminal_id in PointOfSale must have maxlength of 50 $within"
        );
    }

    public function __construct()
    {
    }
}
