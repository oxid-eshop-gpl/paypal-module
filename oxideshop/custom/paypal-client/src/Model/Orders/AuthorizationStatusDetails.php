<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the authorized payment status.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-authorization_status_details.json
 */
class AuthorizationStatusDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
