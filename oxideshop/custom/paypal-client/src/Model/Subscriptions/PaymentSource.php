<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment source definition. To be eligible to create subscription using debit or credit card, you will need
 * to sign up here (https://www.paypal.com/bizsignup/entry/product/ppcp). Please note, its available only for
 * non-3DS cards and for merchants in US and AU regions.
 */
class PaymentSource implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Card
     * The payment card to use to fund a payment. Can be a credit or debit card.
     */
    public $card;
}
