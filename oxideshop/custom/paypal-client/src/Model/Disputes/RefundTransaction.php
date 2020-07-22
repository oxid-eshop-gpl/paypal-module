<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $create_time;
}
