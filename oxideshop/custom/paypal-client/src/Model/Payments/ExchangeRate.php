<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The exchange rate that determines the amount to convert from one currency to another currency.
 */
class ExchangeRate implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $source_currency;

    /** @var string */
    public $target_currency;

    /** @var string */
    public $value;
}
