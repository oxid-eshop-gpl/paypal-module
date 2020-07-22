<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->invoice_id) || Assert::maxLength($this->invoice_id, 127, "invoice_id in SupplementaryPurchaseData must have maxlength of 127 $within");
        !isset($this->custom_id) || Assert::maxLength($this->custom_id, 127, "custom_id in SupplementaryPurchaseData must have maxlength of 127 $within");
        !isset($this->note_to_payer) || Assert::maxLength($this->note_to_payer, 255, "note_to_payer in SupplementaryPurchaseData must have maxlength of 255 $within");
        !isset($this->soft_descriptor) || Assert::maxLength($this->soft_descriptor, 22, "soft_descriptor in SupplementaryPurchaseData must have maxlength of 22 $within");
    }

    public function __construct()
    {
    }
}
