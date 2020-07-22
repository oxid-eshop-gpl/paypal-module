<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
