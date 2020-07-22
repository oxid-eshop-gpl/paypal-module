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
     *
     * minLength: 1
     * maxLength: 255
     */
    public $reference_id;

    /**
     * @var string
     * Reference Id of the parent payment unit.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $parent_reference_id;

    /**
     * @var string
     * Idempotency Id for the payment.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $idempotency_id;

    /**
     * @var string
     * BN Code or Partner Attribution Id used for revenue attribution.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $partner_attribution_id;

    /**
     * @var string
     * Payment Category PHYSICAL_GOODS, DIGITAL_GOODS, DONATIONS, PLATFORM_FEE Etc.
     *
     * minLength: 1
     * maxLength: 127
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
     *
     * minLength: 1
     * maxLength: 127
     */
    public $custom_id;

    /**
     * @var string
     * Description of what is being paid for.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $description;

    /**
     * @var string
     * Invoice id to track this payment.
     *
     * minLength: 1
     * maxLength: 256
     */
    public $invoice_id;

    /**
     * @var string
     * Payment schedule category. Eg: FIRST_RECURRING, SUBSEQUENT_RECURRING, INSTALLMENT, UNSCHEDULED Etc.
     *
     * minLength: 1
     * maxLength: 127
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
     *
     * minLength: 1
     * maxLength: 16
     */
    public $biller_company_name;

    /**
     * @var string
     * The Id of the originator company used in ACH settlement. While processing bank transactions as a third party
     * processor, clients sending transactions to PayPal may or may not provide this info. This Id is assigned by the
     * banks to originator.
     *
     * minLength: 1
     * maxLength: 10
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

    public function validate()
    {
        assert(!isset($this->reference_id) || strlen($this->reference_id) >= 1);
        assert(!isset($this->reference_id) || strlen($this->reference_id) <= 255);
        assert(!isset($this->parent_reference_id) || strlen($this->parent_reference_id) >= 1);
        assert(!isset($this->parent_reference_id) || strlen($this->parent_reference_id) <= 255);
        assert(!isset($this->idempotency_id) || strlen($this->idempotency_id) >= 1);
        assert(!isset($this->idempotency_id) || strlen($this->idempotency_id) <= 255);
        assert(!isset($this->partner_attribution_id) || strlen($this->partner_attribution_id) >= 1);
        assert(!isset($this->partner_attribution_id) || strlen($this->partner_attribution_id) <= 255);
        assert(!isset($this->payment_category) || strlen($this->payment_category) >= 1);
        assert(!isset($this->payment_category) || strlen($this->payment_category) <= 127);
        assert(!isset($this->custom_id) || strlen($this->custom_id) >= 1);
        assert(!isset($this->custom_id) || strlen($this->custom_id) <= 127);
        assert(!isset($this->description) || strlen($this->description) >= 1);
        assert(!isset($this->description) || strlen($this->description) <= 127);
        assert(!isset($this->invoice_id) || strlen($this->invoice_id) >= 1);
        assert(!isset($this->invoice_id) || strlen($this->invoice_id) <= 256);
        assert(!isset($this->payment_schedule_category) || strlen($this->payment_schedule_category) >= 1);
        assert(!isset($this->payment_schedule_category) || strlen($this->payment_schedule_category) <= 127);
        assert(!isset($this->biller_company_name) || strlen($this->biller_company_name) >= 1);
        assert(!isset($this->biller_company_name) || strlen($this->biller_company_name) <= 16);
        assert(!isset($this->biller_company_id) || strlen($this->biller_company_id) >= 1);
        assert(!isset($this->biller_company_id) || strlen($this->biller_company_id) <= 10);
    }
}
