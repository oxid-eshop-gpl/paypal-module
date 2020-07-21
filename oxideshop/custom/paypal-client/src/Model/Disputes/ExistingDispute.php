<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The dispute details.
 */
class ExistingDispute implements JsonSerializable
{
    use BaseModel;

    const REASON_MERCHANDISE_OR_SERVICE_NOT_RECEIVED = 'MERCHANDISE_OR_SERVICE_NOT_RECEIVED';
    const REASON_MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED = 'MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED';
    const REASON_UNAUTHORISED = 'UNAUTHORISED';
    const REASON_CREDIT_NOT_PROCESSED = 'CREDIT_NOT_PROCESSED';
    const REASON_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';
    const REASON_INCORRECT_AMOUNT = 'INCORRECT_AMOUNT';
    const REASON_PAYMENT_BY_OTHER_MEANS = 'PAYMENT_BY_OTHER_MEANS';
    const REASON_CANCELED_RECURRING_BILLING = 'CANCELED_RECURRING_BILLING';
    const REASON_PROBLEM_WITH_REMITTANCE = 'PROBLEM_WITH_REMITTANCE';
    const REASON_OTHER = 'OTHER';
    const STATUS_OPEN = 'OPEN';
    const STATUS_CLOSED = 'CLOSED';

    /** @var string */
    public $id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $update_time;

    /**
     * @var string
     * The reason for the dispute.
     */
    public $reason;

    /**
     * @var string
     * The dispute status.
     */
    public $status;
}
