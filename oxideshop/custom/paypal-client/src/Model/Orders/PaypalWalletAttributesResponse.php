<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional attributes associated with the use of a PayPal Wallet.
 */
class PaypalWalletAttributesResponse implements JsonSerializable
{
    use BaseModel;

    /** @var VaultResponse */
    public $vault;
}
