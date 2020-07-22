<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Basic vault instruction specification that can be extended by specific payment sources that supports vaulting.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-vault_instruction_base.json
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
     * minLength: 1
     * maxLength: 255
     */
    public $confirm_payment_token;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->confirm_payment_token) || Assert::minLength($this->confirm_payment_token, 1, "confirm_payment_token in VaultInstructionBase must have minlength of 1 $within");
        !isset($this->confirm_payment_token) || Assert::maxLength($this->confirm_payment_token, 255, "confirm_payment_token in VaultInstructionBase must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
