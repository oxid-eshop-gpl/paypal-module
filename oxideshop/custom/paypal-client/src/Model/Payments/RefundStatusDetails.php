<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the refund status.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-refund_status_details.json
 */
class RefundStatusDetails implements JsonSerializable
{
    use BaseModel;

    /** The customer's account is funded through an eCheck, which has not yet cleared. */
    const REASON_ECHECK = 'ECHECK';

    /**
     * @var string
     * The reason why the refund has the `PENDING` or `FAILED` status.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_ECHECK
     */
    public $reason;

    public function validate()
    {
    }
}
