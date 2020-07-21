<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The product information.
 */
class ProductDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $description;

    /** @var string */
    public $product_received;

    /** @var string */
    public $product_received_time;

    /** @var array */
    public $sub_reasons;

    /** @var string */
    public $purchase_url;

    /** @var ReturnDetails */
    public $return_details;
}
