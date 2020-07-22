<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
