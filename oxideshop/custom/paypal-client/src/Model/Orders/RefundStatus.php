<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund status.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-refund_status.json
 */
class RefundStatus implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $status;

    /**
     * @var RefundStatusDetails
     * The details of the refund status.
     */
    public $status_details;
}
