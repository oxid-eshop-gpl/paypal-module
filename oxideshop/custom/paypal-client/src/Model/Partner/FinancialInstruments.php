<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Financial instruments attached to this account.
 *
 * generated from: referral_data-financial_instruments.json
 */
class FinancialInstruments implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<Bank>
     * An array of banks attached to this managed account.
     */
    public $banks;

    public function validate()
    {
    }
}
