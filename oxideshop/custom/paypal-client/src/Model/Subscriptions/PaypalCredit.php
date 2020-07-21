<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The Buyer credit option used to fund the payment.
 */
class PaypalCredit implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $type;
}
