<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The Paypal Wallet response.
 */
class PaypalWalletResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var PaypalWalletAttributesResponse
     * Additional attributes associated with the use of a PayPal Wallet.
     */
    public $attributes;
}
