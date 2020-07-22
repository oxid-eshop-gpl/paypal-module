<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
