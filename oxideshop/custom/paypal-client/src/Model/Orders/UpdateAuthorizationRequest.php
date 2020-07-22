<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The authorized payment transaction.
 *
 * generated from: model-update_authorization_request.json
 */
class UpdateAuthorizationRequest implements JsonSerializable
{
    use BaseModel;

    /** The authorized payment is created. No captured payments have been made for this authorized payment. */
    const STATUS_CREATED = 'CREATED';

    /** The authorized payment has one or more captures against it. The sum of these captured payments is greater than the amount of the original authorized payment. */
    const STATUS_CAPTURED = 'CAPTURED';

    /** PayPal cannot authorize funds for this authorized payment. */
    const STATUS_DENIED = 'DENIED';

    /** The authorized payment has expired. */
    const STATUS_EXPIRED = 'EXPIRED';

    /** A captured payment was made for the authorized payment for an amount that is less than the amount of the original authorized payment. */
    const STATUS_PARTIALLY_CAPTURED = 'PARTIALLY_CAPTURED';

    /** The authorized payment was voided. No more captured payments can be made against this authorized payment. */
    const STATUS_VOIDED = 'VOIDED';

    /** The created authorization is in pending state. For more information, see <code>status.details</code> */
    const STATUS_PENDING = 'PENDING';

    /**
     * @var string
     * The unique transaction ID for the authorized payment.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $id;

    /**
     * @var string
     * The status for the authorized payment.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_CAPTURED
     * @see STATUS_DENIED
     * @see STATUS_EXPIRED
     * @see STATUS_PARTIALLY_CAPTURED
     * @see STATUS_VOIDED
     * @see STATUS_PENDING
     * minLength: 1
     * maxLength: 127
     */
    public $status;

    /**
     * @var AuthorizationStatusDetails
     * The details of the authorized payment status.
     */
    public $status_details;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 1);
        assert(!isset($this->id) || strlen($this->id) <= 20);
        assert(!isset($this->status) || strlen($this->status) >= 1);
        assert(!isset($this->status) || strlen($this->status) <= 127);
    }
}
