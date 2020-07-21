<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card used to fund the payment. Card can be a credit or debit card.
 */
class CardResponseWithBillingAddress extends CardResponse implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $name;

    /** @var AddressPortable */
    public $billing_address;
}
