<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Paypal Wallet response.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-paypal_wallet_response.json
 */
class PaypalWalletResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var PaypalWalletAttributesResponse
     * Additional attributes associated with the use of a PayPal Wallet.
     */
    public $attributes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->attributes) || Assert::isInstanceOf($this->attributes, PaypalWalletAttributesResponse::class, "attributes in PaypalWalletResponse must be instance of PaypalWalletAttributesResponse $within");
        !isset($this->attributes) || $this->attributes->validate(PaypalWalletResponse::class);
    }

    public function __construct()
    {
    }
}
