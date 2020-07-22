<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Basic vault instruction specification that can be extended by specific payment sources that supports vaulting.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-vault_instruction_base.json
 */
class VaultInstructionBase implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $confirm_payment_token;
}
