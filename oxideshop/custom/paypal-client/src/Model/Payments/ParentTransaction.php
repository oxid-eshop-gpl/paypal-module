<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information about the parent transaction.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-parent_transaction.json
 */
class ParentTransaction implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $type;
}
