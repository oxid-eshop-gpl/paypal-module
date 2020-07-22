<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The transaction for which to create a case.
 *
 * generated from: referred-transaction.json
 */
class Transaction implements JsonSerializable
{
    use BaseModel;

    /** The transaction processing is complete. */
    const STATUS_COMPLETED = 'COMPLETED';

    /** The items in the transaction are unclaimed. If they are not claimed within 30 days, the funds are returned to the sender. */
    const STATUS_UNCLAIMED = 'UNCLAIMED';

    /** The transaction was denied. */
    const STATUS_DENIED = 'DENIED';

    /** The transaction failed. */
    const STATUS_FAILED = 'FAILED';

    /** The transaction is on hold. */
    const STATUS_HELD = 'HELD';

    /** The transaction is waiting to be processed. */
    const STATUS_PENDING = 'PENDING';

    /** The payment for the transaction was partially refunded. */
    const STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The payment for the transaction was successfully refunded. */
    const STATUS_REFUNDED = 'REFUNDED';

    /** The payment for the transaction was reversed due to a chargeback or another type of reversal. */
    const STATUS_REVERSED = 'REVERSED';

    /** The payment for the transaction was canceled. */
    const STATUS_CANCELED = 'CANCELED';

    /**
     * @var string
     * The ID of the PayPal transaction.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * @var array<ItemInfo>
     * An array of items in the transaction in the dispute.
     */
    public $items;

    /**
     * @var string
     * The transaction status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_COMPLETED
     * @see STATUS_UNCLAIMED
     * @see STATUS_DENIED
     * @see STATUS_FAILED
     * @see STATUS_HELD
     * @see STATUS_PENDING
     * @see STATUS_PARTIALLY_REFUNDED
     * @see STATUS_REFUNDED
     * @see STATUS_REVERSED
     * @see STATUS_CANCELED
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
}
