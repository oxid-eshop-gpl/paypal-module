<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer's wallet used to fund the transaction.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-wallets_response.json
 */
class WalletsResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var ApplePayWalletResponse
     * The Apple Pay Wallet used to fund a payment.
     */
    public $apple_pay;

    public function validate()
    {
    }
}
