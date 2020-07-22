<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund transaction.
 *
 * generated from: referred-refund_transaction.json
 */
class RefundTransaction implements JsonSerializable
{
    use BaseModel;

    /** Refund transaction is newly created. */
    const STATUS_CREATED = 'CREATED';

    /** The refund transaction was denied. */
    const STATUS_DENIED = 'DENIED';

    /** The refund transaction failed. */
    const STATUS_FAILED = 'FAILED';

    /** The refund transaction is on hold. */
    const STATUS_HELD = 'HELD';

    /** The refund transaction is waiting to be processed. */
    const STATUS_PENDING = 'PENDING';

    /** The refund transaction is getting processed. */
    const STATUS_PROCESSING = 'PROCESSING';

    /** The payment for the transaction was partially refunded. */
    const STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The payment for the transaction was successfully refunded. */
    const STATUS_REFUNDED = 'REFUNDED';

    /** The payment for the refund transaction was reversed. */
    const STATUS_REVERSED = 'REVERSED';

    /** The payment for the transaction was canceled. */
    const STATUS_CANCELED = 'CANCELED';

    /** The refund transaction is in some unknown status. */
    const STATUS_OTHER = 'OTHER';

    /**
     * @var string
     * The ID of the PayPal refund transaction.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * @var string
     * The transaction status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_DENIED
     * @see STATUS_FAILED
     * @see STATUS_HELD
     * @see STATUS_PENDING
     * @see STATUS_PROCESSING
     * @see STATUS_PARTIALLY_REFUNDED
     * @see STATUS_REFUNDED
     * @see STATUS_REVERSED
     * @see STATUS_CANCELED
     * @see STATUS_OTHER
     * minLength: 1
     * maxLength: 255
     */
    public $status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $gross_amount;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in RefundTransaction must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 255, "id in RefundTransaction must have maxlength of 255 $within");
        !isset($this->status) || Assert::minLength($this->status, 1, "status in RefundTransaction must have minlength of 1 $within");
        !isset($this->status) || Assert::maxLength($this->status, 255, "status in RefundTransaction must have maxlength of 255 $within");
        !isset($this->gross_amount) || Assert::isInstanceOf($this->gross_amount, Money::class, "gross_amount in RefundTransaction must be instance of Money $within");
        !isset($this->gross_amount) || $this->gross_amount->validate(RefundTransaction::class);
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in RefundTransaction must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in RefundTransaction must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
