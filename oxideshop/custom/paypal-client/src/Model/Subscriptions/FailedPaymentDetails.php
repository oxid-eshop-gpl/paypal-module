<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the failed payment of the subscription.
 *
 * generated from: failed_payment_details.json
 */
class FailedPaymentDetails implements JsonSerializable
{
    use BaseModel;

    /** PayPal declined the payment due to one or more customer issues. */
    const REASON_CODE_PAYMENT_DENIED = 'PAYMENT_DENIED';

    /** An internal server error has occurred. */
    const REASON_CODE_INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';

    /** The payee account is not in good standing and cannot receive payments. */
    const REASON_CODE_PAYEE_ACCOUNT_RESTRICTED = 'PAYEE_ACCOUNT_RESTRICTED';

    /** The payer account is not in good standing and cannot make payments. */
    const REASON_CODE_PAYER_ACCOUNT_RESTRICTED = 'PAYER_ACCOUNT_RESTRICTED';

    /** Payer cannot pay for this transaction. */
    const REASON_CODE_PAYER_CANNOT_PAY = 'PAYER_CANNOT_PAY';

    /** The transaction exceeds the payer's sending limit. */
    const REASON_CODE_SENDING_LIMIT_EXCEEDED = 'SENDING_LIMIT_EXCEEDED';

    /** The transaction exceeds the receiver's receiving limit. */
    const REASON_CODE_TRANSACTION_RECEIVING_LIMIT_EXCEEDED = 'TRANSACTION_RECEIVING_LIMIT_EXCEEDED';

    /** The transaction is declined due to a currency mismatch. */
    const REASON_CODE_CURRENCY_MISMATCH = 'CURRENCY_MISMATCH';

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $time;

    /**
     * @var string
     * The reason code for the payment failure.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_CODE_PAYMENT_DENIED
     * @see REASON_CODE_INTERNAL_SERVER_ERROR
     * @see REASON_CODE_PAYEE_ACCOUNT_RESTRICTED
     * @see REASON_CODE_PAYER_ACCOUNT_RESTRICTED
     * @see REASON_CODE_PAYER_CANNOT_PAY
     * @see REASON_CODE_SENDING_LIMIT_EXCEEDED
     * @see REASON_CODE_TRANSACTION_RECEIVING_LIMIT_EXCEEDED
     * @see REASON_CODE_CURRENCY_MISMATCH
     * minLength: 1
     * maxLength: 120
     */
    public $reason_code;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $next_payment_retry_time;

    public function validate()
    {
        assert(isset($this->amount));
        assert(!isset($this->time) || strlen($this->time) >= 20);
        assert(!isset($this->time) || strlen($this->time) <= 64);
        assert(!isset($this->reason_code) || strlen($this->reason_code) >= 1);
        assert(!isset($this->reason_code) || strlen($this->reason_code) <= 120);
        assert(!isset($this->next_payment_retry_time) || strlen($this->next_payment_retry_time) >= 20);
        assert(!isset($this->next_payment_retry_time) || strlen($this->next_payment_retry_time) <= 64);
    }
}
