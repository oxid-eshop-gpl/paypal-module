<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Additional attributes associated with the use of a PayPal Wallet.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-paypal_wallet_attributes_response.json
 */
class PaypalWalletAttributesResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var VaultResponse
     * The details about a saved payment source.
     */
    public $vault;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->vault) || Assert::isInstanceOf($this->vault, VaultResponse::class, "vault in PaypalWalletAttributesResponse must be instance of VaultResponse $within");
        !isset($this->vault) || $this->vault->validate(PaypalWalletAttributesResponse::class);
    }

    public function __construct()
    {
    }
}
