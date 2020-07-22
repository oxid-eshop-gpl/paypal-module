<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Client configuration that captures the product flows and specific experiences that a user completes a paypal
 * transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-client_configuration.json
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
