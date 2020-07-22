<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment source definition. To be eligible to create subscription using debit or credit card, you will need
 * to sign up here (https://www.paypal.com/bizsignup/entry/product/ppcp). Please note, its available only for
 * non-3DS cards and for merchants in US and AU regions.
 *
 * generated from: payment_source.json
 */
class PaymentSource implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Card
     * The payment card to use to fund a payment. Can be a credit or debit card.
     */
    public $card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::notNull($this->card->number, "number in card must not be NULL within PaymentSource $within");
        !isset($this->card) || Assert::notNull($this->card->expiry, "expiry in card must not be NULL within PaymentSource $within");
        !isset($this->card) || Assert::isInstanceOf($this->card, Card::class, "card in PaymentSource must be instance of Card $within");
        !isset($this->card) || $this->card->validate(PaymentSource::class);
    }

    public function __construct()
    {
    }
}
