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

    /** @var PaypalWalletAttributesResponse */
    public $attributes;
}
