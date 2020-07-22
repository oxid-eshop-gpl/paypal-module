<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Captures either a portion or the full authorized amount of an authorized payment.
 *
 * generated from: capture_request.json
 */
class CaptureRequest extends SupplementaryPurchaseData implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var boolean
     * Indicates whether you can make additional captures against the authorized payment. Set to `true` if you do not
     * intend to capture additional payments against the authorization. Set to `false` if you intend to capture
     * additional payments against the authorization.
     */
    public $final_capture;

    /**
     * @var PaymentInstruction
     * Any additional payment instructions for PayPal Commerce Platform customers. Enables features for the PayPal
     * Commerce Platform, such as delayed disbursement and collection of a platform fee. Applies during order
     * creation for captured payments or during capture of authorized payments.
     */
    public $payment_instruction;

    /**
     * @var SupplementaryData
     * The supplementary data.
     */
    public $supplementary_data;

    public function validate()
    {
        assert(isset($this->amount));
    }
}
