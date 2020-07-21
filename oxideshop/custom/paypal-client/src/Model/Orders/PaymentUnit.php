<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Payment data for a purchase unit.
 */
class PaymentUnit implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reference_id;

    /** @var string */
    public $parent_reference_id;

    /** @var string */
    public $idempotency_id;

    /** @var string */
    public $partner_attribution_id;

    /** @var string */
    public $payment_category;

    /**
     * @var AmountWithBreakdown
     * The total order amount with an optional breakdown that provides details, such as the total item amount, total
     * tax amount, shipping, handling, insurance, and discounts, if any.<br/>If you specify `amount.breakdown`, the
     * amount equals `item_total` plus `tax_total` plus `shipping` plus `handling` plus `insurance` minus
     * `shipping_discount` minus discount.<br/>The amount must be a positive number. For listed of supported
     * currencies and decimal precision, see the PayPal REST APIs <a
     * href="/docs/integration/direct/rest/currency-codes/">Currency Codes</a>.
     */
    public $amount;

    /** @var array<Item> */
    public $items;

    /**
     * @var ShippingDetails
     * Shipping details for transaction.
     */
    public $shipping_details;

    /** @var string */
    public $custom_id;

    /** @var string */
    public $description;

    /** @var string */
    public $invoice_id;

    /** @var string */
    public $payment_schedule_category;

    /**
     * @var SoftDescriptorDetails
     * Soft Descriptor Details.
     */
    public $soft_descriptor_details;

    /** @var string */
    public $biller_company_name;

    /** @var string */
    public $biller_company_id;

    /**
     * @var OdfiDetails
     * ODFI acts as the interface between the Federal Reserve or ACH network and the originator of the transaction.
     */
    public $odfi_details;

    /** @var array<PaymentContextAttribute> */
    public $context_attributes;

    /**
     * @var Participant
     * Participant in a payment activity, one of person or business must be provided.
     */
    public $receiver;

    /**
     * @var PaymentDirectives
     * Payment Directives for transaction.
     */
    public $payment_directives;
}
