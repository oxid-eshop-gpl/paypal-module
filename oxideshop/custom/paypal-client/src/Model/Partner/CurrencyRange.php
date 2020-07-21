<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
 */
class CurrencyRange implements JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $minimum_amount;

    /** @var Money */
    public $maximum_amount;
}
