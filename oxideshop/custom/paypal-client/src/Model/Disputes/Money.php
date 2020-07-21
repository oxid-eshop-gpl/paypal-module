<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The currency and amount for a financial transaction, such as a balance or payment due.
 */
class Money implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $currency_code;

    /** @var string */
    public $value;
}
