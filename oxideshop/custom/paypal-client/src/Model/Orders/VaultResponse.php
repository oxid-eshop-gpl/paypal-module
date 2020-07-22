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

    /** The payment source has been saved in your customer's vault. */
    const STATUS_CREATED = 'CREATED';

    /** Customer has approved the action of saving the specified payment_source into their vault. Use v2/vault/approval-tokens/id/confirm-payment-token to save the payment_source in the vault. */
    const STATUS_APPROVED = 'APPROVED';

    /**
     * @var string
     * The PayPal-generated ID for the saved payment source.
     */
    public $id;

    /**
     * @var string
     * The vault status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_APPROVED
     */
    public $status;
}