<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The product information.
 *
 * generated from: response-product_details.json
 */
class ProductDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $description;

    /** @var string */
    public $product_received;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $product_received_time;

    /** @var array */
    public $sub_reasons;

    /** @var string */
    public $purchase_url;

    /**
     * @var ReturnDetails
     * The return details for the product.
     */
    public $return_details;
}
