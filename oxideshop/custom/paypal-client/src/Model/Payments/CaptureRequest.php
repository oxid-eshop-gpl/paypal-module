<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Captures either a portion or the full authorized amount of an authorized payment.
 */
class CaptureRequest extends SupplementaryPurchaseData implements \JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $amount;

    /** @var boolean */
    public $final_capture;

    /** @var PaymentInstruction */
    public $payment_instruction;

    /** @var SupplementaryData */
    public $supplementary_data;
}
