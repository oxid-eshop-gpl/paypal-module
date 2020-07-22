<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer and merchant payment preferences.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-payment_method.json
 */
class PaymentMethod implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $payer_selected;

    /** @var string */
    public $payee_preferred;

    /** @var string */
    public $category;
}
