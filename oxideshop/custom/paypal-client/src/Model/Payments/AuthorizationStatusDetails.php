<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the authorized payment status.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-authorization_status_details.json
 */
class AuthorizationStatusDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
