<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Payment Directives for transaction.
 */
class PaymentDirectives implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Disbursement type.
     */
    public $disbursement_type;

    /** @var string */
    public $linked_group_id;

    /** @var string */
    public $settlement_account_number;

    /** @var string */
    public $loss_account_number;

    /**
     * @var string
     * Liability type defined by PayPal Risk.
     */
    public $liability_type;

    /** @var boolean */
    public $special_deny;

    /** @var boolean */
    public $allow_duplicate_invoice_id;

    /** @var array<PolicyDirective> */
    public $policy_directives;

    /** @var array<PaymentMethodDirective> */
    public $payment_method_directives;

    /** @var array<PricingDirective> */
    public $pricing_directives;

    /**
     * @var AuthorizationDirectives
     * Auth directives for the transaction.
     */
    public $authorization_directives;

    /**
     * @var string
     * Currency receiving type defines the options when receiving payment in a currency not held by the reciver.
     */
    public $currency_receiving_directive;

    /** @var boolean */
    public $immediate_payment_required;
}
