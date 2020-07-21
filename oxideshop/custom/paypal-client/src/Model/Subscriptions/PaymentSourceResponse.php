<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment source used to fund the payment.
 */
class PaymentSourceResponse implements JsonSerializable
{
    use BaseModel;

    /** @var CardResponseWithBillingAddress */
    public $card;
}
