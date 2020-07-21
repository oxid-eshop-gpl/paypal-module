<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Client configuration that captures the product flows and specific experiences that a user completes a paypal
 * transaction.
 */
class ClientConfiguration implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $product_code;

    /** @var string */
    public $product_feature;

    /** @var string */
    public $api;

    /** @var string */
    public $integration_artifact;

    /**
     * @var ProductExperience
     * The product experiences that a user completes on a PayPal transaction.
     */
    public $experience;
}
