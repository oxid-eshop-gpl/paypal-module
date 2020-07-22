<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The capture identification-related fields. Includes the invoice ID, custom ID, note to payer, and soft
 * descriptor.
 *
 * generated from: supplementary_purchase_data.json
 */
class SupplementaryPurchaseData implements JsonSerializable
{
    use BaseModel;

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
     * An informational note about this settlement. Appears in both the payer's transaction history and the emails
     * that the payer receives.
     *
     * maxLength: 255
     */
    public $note_to_payer;

    /**
     * @var string
     * <strong>Note:</strong> This field has been marked INTERNAL to ensure backward compatibility, please do not use
     * this for any future integrations as this field is not supported for this end point. The payment descriptor
     * that appears on the customer's credit card statement for this transaction.
     *
     * maxLength: 22
     */
    public $soft_descriptor;

    public function validate()
    {
        assert(!isset($this->invoice_id) || strlen($this->invoice_id) <= 127);
        assert(!isset($this->custom_id) || strlen($this->custom_id) <= 127);
        assert(!isset($this->note_to_payer) || strlen($this->note_to_payer) <= 255);
        assert(!isset($this->soft_descriptor) || strlen($this->soft_descriptor) <= 22);
    }
}
