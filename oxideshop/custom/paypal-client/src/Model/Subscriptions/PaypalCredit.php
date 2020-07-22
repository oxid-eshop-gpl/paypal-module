<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The Buyer credit option used to fund the payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-paypal_credit.json
 */
class PaypalCredit implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $type;
}
