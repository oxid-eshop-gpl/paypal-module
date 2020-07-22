<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
        assert(isset($this->amount));
        assert(!isset($this->invoice_id) || strlen($this->invoice_id) <= 127);
        assert(!isset($this->custom_id) || strlen($this->custom_id) <= 127);
        assert(!isset($this->note_to_payer) || strlen($this->note_to_payer) <= 255);
    }
}
