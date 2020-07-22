<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer's funding instrument. Returned as a funding option to external entities.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-funding_instrument_response.json
 */
class FundingInstrumentResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var CardResponse
     * The payment card to use to fund a payment. Card can be a credit or debit card.
     */
    public $card;

    /**
     * @var BankAccountResponse
     * The details for a bank account that can be used to fund a payment.
     */
    public $bank_account;

    /**
     * @var PaypalCredit
     * The Buyer credit option used to fund the payment.
     */
    public $credit;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf($this->card, CardResponse::class, "card in FundingInstrumentResponse must be instance of CardResponse $within");
        !isset($this->card) || $this->card->validate(FundingInstrumentResponse::class);
        !isset($this->bank_account) || Assert::isInstanceOf($this->bank_account, BankAccountResponse::class, "bank_account in FundingInstrumentResponse must be instance of BankAccountResponse $within");
        !isset($this->bank_account) || $this->bank_account->validate(FundingInstrumentResponse::class);
        !isset($this->credit) || Assert::isInstanceOf($this->credit, PaypalCredit::class, "credit in FundingInstrumentResponse must be instance of PaypalCredit $within");
        !isset($this->credit) || $this->credit->validate(FundingInstrumentResponse::class);
    }

    public function __construct()
    {
    }
}
