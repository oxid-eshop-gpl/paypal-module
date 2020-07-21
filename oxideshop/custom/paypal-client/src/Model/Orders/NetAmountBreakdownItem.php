<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The net amount. Returned when the currency of the refund is different from the currency of the PayPal account
 * where the merchant holds their funds.
 */
class NetAmountBreakdownItem implements JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $payable_amount;

    /** @var Money */
    public $converted_amount;

    /** @var ExchangeRate */
    public $exchange_rate;
}
