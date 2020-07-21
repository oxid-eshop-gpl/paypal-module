<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The customer's funding instrument. Returned as a funding option to external entities.
 */
class FundingInstrumentResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var CardResponse */
    public $card;

    /** @var BankAccountResponse */
    public $bank_account;

    /** @var PaypalCredit */
    public $credit;
}
