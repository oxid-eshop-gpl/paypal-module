<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer's wallet used to fund the transaction.
 */
class WalletsResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var ApplePayWalletResponse */
    public $apple_pay;
}
