<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The product experiences that a user completes on a PayPal transaction.
 */
class ProductExperience implements \JsonSerializable
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
