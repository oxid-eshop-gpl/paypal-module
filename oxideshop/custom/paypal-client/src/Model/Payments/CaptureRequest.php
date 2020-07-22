<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
    public $final_capture = 'false';

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within CaptureRequest $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within CaptureRequest $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in CaptureRequest must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(CaptureRequest::class);
        !isset($this->payment_instruction) || Assert::isInstanceOf($this->payment_instruction, PaymentInstruction::class, "payment_instruction in CaptureRequest must be instance of PaymentInstruction $within");
        !isset($this->payment_instruction) || $this->payment_instruction->validate(CaptureRequest::class);
        !isset($this->supplementary_data) || Assert::isInstanceOf($this->supplementary_data, SupplementaryData::class, "supplementary_data in CaptureRequest must be instance of SupplementaryData $within");
        !isset($this->supplementary_data) || $this->supplementary_data->validate(CaptureRequest::class);
    }

    public function __construct()
    {
    }
}
