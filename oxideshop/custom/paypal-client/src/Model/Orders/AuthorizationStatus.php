<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The status fields for an authorized payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-authorization_status.json
 */
class AuthorizationStatus implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $status;

    /**
     * @var AuthorizationStatusDetails
     * The details of the authorized payment status.
     */
    public $status_details;
}
