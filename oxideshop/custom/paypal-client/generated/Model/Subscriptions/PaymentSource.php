<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\MerchantV1\Card;
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
     * The payment card to use to fund a payment. Can be a credit or debit card.
     *
     * @var Card | null
     */
    public $card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf(
            $this->card,
            Card::class,
            "card in PaymentSource must be instance of Card $within"
        );
        !isset($this->card) ||  $this->card->validate(PaymentSource::class);
    }

    private function map(array $data)
    {
        if (isset($data['card'])) {
            $this->card = new Card($data['card']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
