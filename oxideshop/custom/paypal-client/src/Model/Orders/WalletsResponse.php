<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->apple_pay) || Assert::isInstanceOf($this->apple_pay, ApplePayWalletResponse::class, "apple_pay in WalletsResponse must be instance of ApplePayWalletResponse $within");
        !isset($this->apple_pay) || $this->apple_pay->validate(WalletsResponse::class);
    }

    public function __construct()
    {
    }
}
