<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Payment data for a purchase unit.
 *
 * generated from: model-payment_unit.json
 */
class PaymentUnit implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Unique Identifier for this payment unit scoped in current order.
     */
    public $reference_id;

    /**
     * @var string
     * Reference Id of the parent payment unit.
     */
    public $parent_reference_id;

    /**
     * @var string
     * Idempotency Id for the payment.
     */
    public $idempotency_id;

    /**
     * @var string
     * BN Code or Partner Attribution Id used for revenue attribution.
     */
    public $partner_attribution_id;

    /**
     * @var string
     * Payment Category PHYSICAL_GOODS, DIGITAL_GOODS, DONATIONS, PLATFORM_FEE Etc.
     */
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

    /**
     * @var array<Item>
     * List of purchase items.
     */
    public $items;

    /**
     * @var ShippingDetails
     * Shipping details for transaction.
     */
    public $shipping_details;

    /**
     * @var string
     * Free-form field for the use of clients.
     */
    public $custom_id;

    /**
     * @var string
     * Description of what is being paid for.
     */
    public $description;

    /**
     * @var string
     * Invoice id to track this payment.
     */
    public $invoice_id;

    /**
     * @var string
     * Payment schedule category. Eg: FIRST_RECURRING, SUBSEQUENT_RECURRING, INSTALLMENT, UNSCHEDULED Etc.
     */
    public $payment_schedule_category;

    /**
     * @var SoftDescriptorDetails
     * Soft Descriptor Details.
     */
    public $soft_descriptor_details;

    /**
     * @var string
     * The name of the originator company used in ACH settlement. While processing bank transactions as a third party
     * processor, clients sending transactions to PayPal may or may not provide this info.
     */
    public $biller_company_name;

    /**
     * @var string
     * The Id of the originator company used in ACH settlement. While processing bank transactions as a third party
     * processor, clients sending transactions to PayPal may or may not provide this info. This Id is assigned by the
     * banks to originator.
     */
    public $biller_company_id;

    /**
     * @var OdfiDetails
     * ODFI acts as the interface between the Federal Reserve or ACH network and the originator of the transaction.
     */
    public $odfi_details;

    /**
     * @var array<PaymentContextAttribute>
     * List of context attributes usually used to lookup as an alternative id or provides a relative context for a
     * payment.
     */
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
