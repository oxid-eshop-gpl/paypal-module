<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Apple Pay Wallet used to fund a payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-apple_pay_wallet_response.json
 */
class ApplePayWalletResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ApplePayCardResponse
     * The Card from Apple Pay Wallet used to fund the payment
     */
    public $card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf($this->card, ApplePayCardResponse::class, "card in ApplePayWalletResponse must be instance of ApplePayCardResponse $within");
        !isset($this->card) || $this->card->validate(ApplePayWalletResponse::class);
    }

    public function __construct()
    {
    }
}
