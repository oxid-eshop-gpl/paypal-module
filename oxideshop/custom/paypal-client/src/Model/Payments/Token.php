<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tokenized payment source to fund a payment.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-token.json
 */
class Token implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $type;
}
