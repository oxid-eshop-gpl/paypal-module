<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The product experiences that a user completes on a PayPal transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-product_experience.json
 */
class ProductExperience implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $user_experience_flow;

    /** @var string */
    public $entry_point;

    /** @var string */
    public $payment_method;

    /** @var string */
    public $channel;

    /** @var string */
    public $product_flow;
}
