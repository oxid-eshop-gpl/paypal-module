<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     * @var Item[]
     * List of purchase items.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 10
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
     * @var PaymentContextAttribute[]
     * List of context attributes usually used to lookup as an alternative id or provides a relative context for a
     * payment.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 50
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reference_id) || Assert::minLength($this->reference_id, 1, "reference_id in PaymentUnit must have minlength of 1 $within");
        !isset($this->reference_id) || Assert::maxLength($this->reference_id, 255, "reference_id in PaymentUnit must have maxlength of 255 $within");
        !isset($this->parent_reference_id) || Assert::minLength($this->parent_reference_id, 1, "parent_reference_id in PaymentUnit must have minlength of 1 $within");
        !isset($this->parent_reference_id) || Assert::maxLength($this->parent_reference_id, 255, "parent_reference_id in PaymentUnit must have maxlength of 255 $within");
        !isset($this->idempotency_id) || Assert::minLength($this->idempotency_id, 1, "idempotency_id in PaymentUnit must have minlength of 1 $within");
        !isset($this->idempotency_id) || Assert::maxLength($this->idempotency_id, 255, "idempotency_id in PaymentUnit must have maxlength of 255 $within");
        !isset($this->partner_attribution_id) || Assert::minLength($this->partner_attribution_id, 1, "partner_attribution_id in PaymentUnit must have minlength of 1 $within");
        !isset($this->partner_attribution_id) || Assert::maxLength($this->partner_attribution_id, 255, "partner_attribution_id in PaymentUnit must have maxlength of 255 $within");
        !isset($this->payment_category) || Assert::minLength($this->payment_category, 1, "payment_category in PaymentUnit must have minlength of 1 $within");
        !isset($this->payment_category) || Assert::maxLength($this->payment_category, 127, "payment_category in PaymentUnit must have maxlength of 127 $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, AmountWithBreakdown::class, "amount in PaymentUnit must be instance of AmountWithBreakdown $within");
        !isset($this->amount) || $this->amount->validate(PaymentUnit::class);
        Assert::notNull($this->items, "items in PaymentUnit must not be NULL $within");
         Assert::minCount($this->items, 1, "items in PaymentUnit must have min. count of 1 $within");
         Assert::maxCount($this->items, 10, "items in PaymentUnit must have max. count of 10 $within");
         Assert::isArray($this->items, "items in PaymentUnit must be array $within");

                                if (isset($this->items)){
                                    foreach ($this->items as $item) {
                                        $item->validate(PaymentUnit::class);
                                    }
                                }

        !isset($this->shipping_details) || Assert::isInstanceOf($this->shipping_details, ShippingDetails::class, "shipping_details in PaymentUnit must be instance of ShippingDetails $within");
        !isset($this->shipping_details) || $this->shipping_details->validate(PaymentUnit::class);
        !isset($this->custom_id) || Assert::minLength($this->custom_id, 1, "custom_id in PaymentUnit must have minlength of 1 $within");
        !isset($this->custom_id) || Assert::maxLength($this->custom_id, 127, "custom_id in PaymentUnit must have maxlength of 127 $within");
        !isset($this->description) || Assert::minLength($this->description, 1, "description in PaymentUnit must have minlength of 1 $within");
        !isset($this->description) || Assert::maxLength($this->description, 127, "description in PaymentUnit must have maxlength of 127 $within");
        !isset($this->invoice_id) || Assert::minLength($this->invoice_id, 1, "invoice_id in PaymentUnit must have minlength of 1 $within");
        !isset($this->invoice_id) || Assert::maxLength($this->invoice_id, 256, "invoice_id in PaymentUnit must have maxlength of 256 $within");
        !isset($this->payment_schedule_category) || Assert::minLength($this->payment_schedule_category, 1, "payment_schedule_category in PaymentUnit must have minlength of 1 $within");
        !isset($this->payment_schedule_category) || Assert::maxLength($this->payment_schedule_category, 127, "payment_schedule_category in PaymentUnit must have maxlength of 127 $within");
        !isset($this->soft_descriptor_details) || Assert::isInstanceOf($this->soft_descriptor_details, SoftDescriptorDetails::class, "soft_descriptor_details in PaymentUnit must be instance of SoftDescriptorDetails $within");
        !isset($this->soft_descriptor_details) || $this->soft_descriptor_details->validate(PaymentUnit::class);
        !isset($this->biller_company_name) || Assert::minLength($this->biller_company_name, 1, "biller_company_name in PaymentUnit must have minlength of 1 $within");
        !isset($this->biller_company_name) || Assert::maxLength($this->biller_company_name, 16, "biller_company_name in PaymentUnit must have maxlength of 16 $within");
        !isset($this->biller_company_id) || Assert::minLength($this->biller_company_id, 1, "biller_company_id in PaymentUnit must have minlength of 1 $within");
        !isset($this->biller_company_id) || Assert::maxLength($this->biller_company_id, 10, "biller_company_id in PaymentUnit must have maxlength of 10 $within");
        !isset($this->odfi_details) || Assert::isInstanceOf($this->odfi_details, OdfiDetails::class, "odfi_details in PaymentUnit must be instance of OdfiDetails $within");
        !isset($this->odfi_details) || $this->odfi_details->validate(PaymentUnit::class);
        Assert::notNull($this->context_attributes, "context_attributes in PaymentUnit must not be NULL $within");
         Assert::minCount($this->context_attributes, 1, "context_attributes in PaymentUnit must have min. count of 1 $within");
         Assert::maxCount($this->context_attributes, 50, "context_attributes in PaymentUnit must have max. count of 50 $within");
         Assert::isArray($this->context_attributes, "context_attributes in PaymentUnit must be array $within");

                                if (isset($this->context_attributes)){
                                    foreach ($this->context_attributes as $item) {
                                        $item->validate(PaymentUnit::class);
                                    }
                                }

        !isset($this->receiver) || Assert::isInstanceOf($this->receiver, Participant::class, "receiver in PaymentUnit must be instance of Participant $within");
        !isset($this->receiver) || $this->receiver->validate(PaymentUnit::class);
        !isset($this->payment_directives) || Assert::isInstanceOf($this->payment_directives, PaymentDirectives::class, "payment_directives in PaymentUnit must be instance of PaymentDirectives $within");
        !isset($this->payment_directives) || $this->payment_directives->validate(PaymentUnit::class);
    }

    public function __construct()
    {
    }
}
