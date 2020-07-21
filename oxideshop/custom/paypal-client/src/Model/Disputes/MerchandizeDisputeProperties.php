<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The customer-provided merchandise issue details for the dispute.
 */
class MerchandizeDisputeProperties implements \JsonSerializable
{
    /** @var string */
    public $issue_type;

    /** @var ProductDetails */
    public $product_details;

    /** @var ServiceDetails */
    public $service_details;

    /** @var AddressPortable */
    public $return_shipping_address;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
