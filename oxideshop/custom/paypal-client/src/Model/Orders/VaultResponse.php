<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details about a saved payment source.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-vault_response.json
 */
class VaultResponse implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $status;
}
