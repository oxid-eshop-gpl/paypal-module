<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Refunds a captured payment, by ID. For a full refund, include an empty request body. For a partial refund,
 * include an <code>amount</code> object in the request body.
 *
 * generated from: refund_request.json
 */
class RefundRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var string
     * The API caller-provided external invoice number for this order. Appears in both the payer's transaction
     * history and the emails that the payer receives.
     *
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * @var string
     * The API caller-provided external ID. Used to reconcile API caller-initiated transactions with PayPal
     * transactions. Appears in transaction and settlement reports.
     *
     * maxLength: 127
     */
    public $custom_id;

    /**
     * @var string
     * The reason for the refund. Appears in both the payer's transaction history and the emails that the payer
     * receives.
     *
     * maxLength: 255
     */
    public $note_to_payer;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within RefundRequest $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within RefundRequest $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in RefundRequest must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(RefundRequest::class);
        !isset($this->invoice_id) || Assert::maxLength($this->invoice_id, 127, "invoice_id in RefundRequest must have maxlength of 127 $within");
        !isset($this->custom_id) || Assert::maxLength($this->custom_id, 127, "custom_id in RefundRequest must have maxlength of 127 $within");
        !isset($this->note_to_payer) || Assert::maxLength($this->note_to_payer, 255, "note_to_payer in RefundRequest must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
