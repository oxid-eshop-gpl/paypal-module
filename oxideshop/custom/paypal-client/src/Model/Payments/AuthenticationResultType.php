<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Indicates the form of authentication used on the financial instrument.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-authentication_result_type.json
 */
class AuthenticationResultType implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;
}
