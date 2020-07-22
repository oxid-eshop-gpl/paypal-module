<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The purchase unit details. Used to capture required information for the payment contract.
 *
 * generated from: purchase_unit.json
 */
class PurchaseUnit implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The API caller-provided external ID for the purchase unit. Required for multiple purchase units when you must
     * update the order through `PATCH`. If you omit this value and the order contains only one purchase unit, PayPal
     * sets this value to `default`. <blockquote><strong>Note:</strong> If there are multiple purchase units,
     * <code>reference_id</code> is required for each purchase unit.</blockquote>
     *
     * maxLength: 256
     */
    public $reference_id;

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
     * @var Payee
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     */
    public $payee;

    /**
     * @var PaymentInstruction
     * Any additional payment instructions for PayPal Commerce Platform customers. Enables features for the PayPal
     * Commerce Platform, such as delayed disbursement and collection of a platform fee. Applies during order
     * creation for captured payments or during capture of authorized payments.
     */
    public $payment_instruction;

    /**
     * @var string
     * The purchase description.
     *
     * maxLength: 127
     */
    public $description;

    /**
     * @var string
     * The API caller-provided external ID. Used to reconcile API caller-initiated transactions with PayPal
     * transactions. Appears in transaction and settlement reports.
     *
     * maxLength: 127
     */
    public $custom_id;

    /**
     * @var string
     * The API caller-provided external invoice ID for this order.
     *
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * @var string
     * The PayPal-generated ID for the purchase unit. This ID appears in both the payer's transaction history and the
     * emails that the payer receives. In addition, this ID is available in transaction and settlement reports that
     * merchants and API callers can use to reconcile transactions. This ID is only available when an order is saved
     * by calling <code>v2/checkout/orders/id/save</code>.
     *
     * maxLength: 19
     */
    public $id;

    /**
     * @var string
     * The payment descriptor on account transactions on the customer's credit card statement, that PayPal sends to
     * processors. The maximum length of the soft descriptor information that you can pass in the API field is 22
     * characters, in the following format:<pre>22 - len(PAYPAL * (8)) - len(<var>Descriptor in Payment Receiving
     * Preferences of Merchant account</var> + 1)</pre>The PAYPAL prefix uses 8 characters.<br/><br/>The soft
     * descriptor supports the following ASCII characters:<ul><li>Alphanumeric
     * characters</li><li>Dashes</li><li>Asterisks</li><li>Periods (.)</li><li>Spaces</li></ul>For Wallet payments
     * marketplace integrations:<ul><li>The merchant descriptor in the Payment Receiving Preferences must be the
     * marketplace name.</li><li>You can't use the remaining space to show the customer service number.</li><li>The
     * remaining spaces can be a combination of seller name and country.</li></ul><br/>For unbranded payments (Direct
     * Card) marketplace integrations, use a combination of the seller name and phone number.
     *
     * maxLength: 22
     */
    public $soft_descriptor;

    /**
     * @var Item[]
     * An array of items that the customer purchases from the merchant.
     */
    public $items;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping;

    /**
     * @var SupplementaryData
     * The supplementary data.
     */
    public $supplementary_data;

    /**
     * @var PaymentCollection
     * The collection of payments, or transactions, for a purchase unit in an order. For example, authorized
     * payments, captured payments, and refunds.
     */
    public $payments;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->reference_id) || Assert::maxLength($this->reference_id, 256, "reference_id in PurchaseUnit must have maxlength of 256 $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, AmountWithBreakdown::class, "amount in PurchaseUnit must be instance of AmountWithBreakdown $within");
        !isset($this->amount) || $this->amount->validate(PurchaseUnit::class);
        !isset($this->payee) || Assert::isInstanceOf($this->payee, Payee::class, "payee in PurchaseUnit must be instance of Payee $within");
        !isset($this->payee) || $this->payee->validate(PurchaseUnit::class);
        !isset($this->payment_instruction) || Assert::isInstanceOf($this->payment_instruction, PaymentInstruction::class, "payment_instruction in PurchaseUnit must be instance of PaymentInstruction $within");
        !isset($this->payment_instruction) || $this->payment_instruction->validate(PurchaseUnit::class);
        !isset($this->description) || Assert::maxLength($this->description, 127, "description in PurchaseUnit must have maxlength of 127 $within");
        !isset($this->custom_id) || Assert::maxLength($this->custom_id, 127, "custom_id in PurchaseUnit must have maxlength of 127 $within");
        !isset($this->invoice_id) || Assert::maxLength($this->invoice_id, 127, "invoice_id in PurchaseUnit must have maxlength of 127 $within");
        !isset($this->id) || Assert::maxLength($this->id, 19, "id in PurchaseUnit must have maxlength of 19 $within");
        !isset($this->soft_descriptor) || Assert::maxLength($this->soft_descriptor, 22, "soft_descriptor in PurchaseUnit must have maxlength of 22 $within");
        !isset($this->items) || Assert::isArray($this->items, "items in PurchaseUnit must be array $within");

                                if (isset($this->items)){
                                    foreach ($this->items as $item) {
                                        $item->validate(PurchaseUnit::class);
                                    }
                                }

        !isset($this->shipping) || Assert::isInstanceOf($this->shipping, ShippingDetail::class, "shipping in PurchaseUnit must be instance of ShippingDetail $within");
        !isset($this->shipping) || $this->shipping->validate(PurchaseUnit::class);
        !isset($this->supplementary_data) || Assert::isInstanceOf($this->supplementary_data, SupplementaryData::class, "supplementary_data in PurchaseUnit must be instance of SupplementaryData $within");
        !isset($this->supplementary_data) || $this->supplementary_data->validate(PurchaseUnit::class);
        !isset($this->payments) || Assert::isInstanceOf($this->payments, PaymentCollection::class, "payments in PurchaseUnit must be instance of PaymentCollection $within");
        !isset($this->payments) || $this->payments->validate(PurchaseUnit::class);
    }

    public function __construct()
    {
    }
}
