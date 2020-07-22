<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund status.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-refund_status.json
 */
class RefundStatus implements JsonSerializable
{
    use BaseModel;

    /** The refund was cancelled. */
    const STATUS_CANCELLED = 'CANCELLED';

    /** The refund is pending. For more information, see <code>status_details.reason</code>. */
    const STATUS_PENDING = 'PENDING';

    /** The funds for this transaction were debited to the customer's account. */
    const STATUS_COMPLETED = 'COMPLETED';

    /**
     * @var string
     * The status of the refund.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CANCELLED
     * @see STATUS_PENDING
     * @see STATUS_COMPLETED
     */
    public $status;

    /**
     * @var RefundStatusDetails
     * The details of the refund status.
     */
    public $status_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->status_details) || Assert::isInstanceOf($this->status_details, RefundStatusDetails::class, "status_details in RefundStatus must be instance of RefundStatusDetails $within");
        !isset($this->status_details) || $this->status_details->validate(RefundStatus::class);
    }

    public function __construct()
    {
    }
}
