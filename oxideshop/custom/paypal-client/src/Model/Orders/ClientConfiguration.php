<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * Client configuration that captures the product flows and specific experiences that a user completes a paypal transaction.
 */
class ClientConfiguration implements \JsonSerializable
{
    /** @var string */
    public $product_code;

    /** @var string */
    public $product_feature;

    /** @var string */
    public $api;

    /** @var string */
    public $integration_artifact;

    /** @var ProductExperience */
    public $experience;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
