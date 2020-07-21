<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The credit not processed details.
 */
class CreditNotProcessed implements \JsonSerializable
{
    /** @var string */
    public $issue_type;

    /** @var Money */
    public $expected_refund;

    /** @var CancellationDetails */
    public $cancellation_details;

    /** @var ProductDetails */
    public $product_details;

    /** @var ServiceDetails */
    public $service_details;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
