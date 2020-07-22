<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A captured payment.
 *
 * generated from: model-update_capture_request.json
 */
class UpdateCaptureRequest implements JsonSerializable
{
    use BaseModel;

    /** The funds for this captured payment were credited to the payee's PayPal account. */
    const STATUS_COMPLETED = 'COMPLETED';

    /** The funds could not be captured. */
    const STATUS_DECLINED = 'DECLINED';

    /** An amount less than this captured payment's amount was partially refunded to the payer. */
    const STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The funds for this captured payment was not yet credited to the payee's PayPal account. For more information, see <code>status.details</code> */
    const STATUS_PENDING = 'PENDING';

    /** An amount greater than or equal to this captured payment's amount was refunded to the payer. */
    const STATUS_REFUNDED = 'REFUNDED';

    /**
     * @var string
     * The transaction ID for the captured payment.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $id;

    /**
     * @var string
     * The status of the captured payment.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_COMPLETED
     * @see STATUS_DECLINED
     * @see STATUS_PARTIALLY_REFUNDED
     * @see STATUS_PENDING
     * @see STATUS_REFUNDED
     * minLength: 1
     * maxLength: 127
     */
    public $status;

    /**
     * @var CaptureStatusDetails
     * The details of the captured payment status.
     */
    public $status_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in UpdateCaptureRequest must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 20, "id in UpdateCaptureRequest must have maxlength of 20 $within");
        !isset($this->status) || Assert::minLength($this->status, 1, "status in UpdateCaptureRequest must have minlength of 1 $within");
        !isset($this->status) || Assert::maxLength($this->status, 127, "status in UpdateCaptureRequest must have maxlength of 127 $within");
        !isset($this->status_details) || Assert::isInstanceOf($this->status_details, CaptureStatusDetails::class, "status_details in UpdateCaptureRequest must be instance of CaptureStatusDetails $within");
        !isset($this->status_details) || $this->status_details->validate(UpdateCaptureRequest::class);
    }

    public function __construct()
    {
    }
}
