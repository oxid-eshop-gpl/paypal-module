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
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $amount;

    /**
     * The API caller-provided external invoice number for this order. Appears in both the payer's transaction
     * history and the emails that the payer receives.
     *
     * @var string | null
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * The API caller-provided external ID. Used to reconcile API caller-initiated transactions with PayPal
     * transactions. Appears in transaction and settlement reports.
     *
     * @var string | null
     * maxLength: 127
     */
    public $custom_id;

    /**
     * The reason for the refund. Appears in both the payer's transaction history and the emails that the payer
     * receives.
     *
     * @var string | null
     * maxLength: 255
     */
    public $note_to_payer;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::isInstanceOf(
            $this->amount,
            Money::class,
            "amount in RefundRequest must be instance of Money $within"
        );
        !isset($this->amount) ||  $this->amount->validate(RefundRequest::class);
        !isset($this->invoice_id) || Assert::maxLength(
            $this->invoice_id,
            127,
            "invoice_id in RefundRequest must have maxlength of 127 $within"
        );
        !isset($this->custom_id) || Assert::maxLength(
            $this->custom_id,
            127,
            "custom_id in RefundRequest must have maxlength of 127 $within"
        );
        !isset($this->note_to_payer) || Assert::maxLength(
            $this->note_to_payer,
            255,
            "note_to_payer in RefundRequest must have maxlength of 255 $within"
        );
    }

    public function __construct()
    {
    }
}
