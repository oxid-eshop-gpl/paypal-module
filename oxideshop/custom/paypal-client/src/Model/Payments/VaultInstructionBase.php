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

    /** Defines that the payer's payment-source should be vaulted only when at least one payment (authorization/capture) using that payment-source is successful. */
    const CONFIRM_PAYMENT_TOKEN_ON_ORDER_COMPLETION = 'ON_ORDER_COMPLETION';

    /**
     * @var string
     * Defines how and when the payment source gets vaulted.
     *
     * use one of constants defined in this class to set the value:
     * @see CONFIRM_PAYMENT_TOKEN_ON_ORDER_COMPLETION
     */
    public $confirm_payment_token;
}
