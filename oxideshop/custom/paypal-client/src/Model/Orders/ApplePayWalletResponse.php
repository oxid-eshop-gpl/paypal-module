<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The Apple Pay Wallet used to fund a payment.
 */
class ApplePayWalletResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var ApplePayCardResponse */
    public $card;
}
