<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The status of a captured payment.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-capture_status.json
 */
class CaptureStatus implements JsonSerializable
{
    use BaseModel;

    /** The funds for this captured payment were credited to the payee's PayPal account. */
    const STATUS_COMPLETED = 'COMPLETED';

    /** The funds could not be captured. */
    const STATUS_DECLINED = 'DECLINED';

    /** An amount less than this captured payment's amount was partially refunded to the payer. */
    const STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The funds for this captured payment was not yet credited to the payee's PayPal account. For more information, see <code>status.details</code>. */
    const STATUS_PENDING = 'PENDING';

    /** An amount greater than or equal to this captured payment's amount was refunded to the payer. */
    const STATUS_REFUNDED = 'REFUNDED';

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
     */
    public $status;

    /**
     * @var CaptureStatusDetails
     * The details of the captured payment status.
     */
    public $status_details;
}
