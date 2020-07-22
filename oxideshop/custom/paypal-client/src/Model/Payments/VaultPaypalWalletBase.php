<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Resource consolidating common request and response attirbutes for vaulting PayPal Wallet.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-vault_paypal_wallet_base.json
 */
class VaultPaypalWalletBase implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $description;

    /** @var string */
    public $product_label;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping;

    /** @var string */
    public $usage_type;

    /** @var string */
    public $customer_type;

    /** @var boolean */
    public $permit_multiple_payment_tokens;
}
