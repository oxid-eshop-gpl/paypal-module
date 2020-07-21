<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer-provided merchandise issue details for the dispute.
 */
class MerchandizeDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $issue_type;

    /** @var ProductDetails */
    public $product_details;

    /** @var ServiceDetails */
    public $service_details;

    /** @var AddressPortable */
    public $return_shipping_address;
}
