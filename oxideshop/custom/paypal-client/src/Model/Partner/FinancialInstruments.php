<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Financial instruments attached to this account.
 */
class FinancialInstruments implements JsonSerializable
{
    use BaseModel;

    /** @var array<Bank> */
    public $banks;
}
