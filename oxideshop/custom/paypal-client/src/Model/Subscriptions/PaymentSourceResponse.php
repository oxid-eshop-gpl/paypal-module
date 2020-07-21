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

    /**
     * @var CardResponseWithBillingAddress
     * The payment card used to fund the payment. Card can be a credit or debit card.
     */
    public $card;
}
