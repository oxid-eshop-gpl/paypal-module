<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The purchase unit request. Includes required information for the payment contract.
 *
 * generated from: purchase_unit_request.json
 */
class PurchaseUnitRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The API caller-provided external ID for the purchase unit. Required for multiple purchase units when you must
     * update the order through `PATCH`. If you omit this value and the order contains only one purchase unit, PayPal
     * sets this value to `default`.
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
     */
    public $description;

    /**
     * @var string
     * The API caller-provided external ID. Used to reconcile client transactions with PayPal transactions. Appears
     * in transaction and settlement reports but is not visible to the payer.
     */
    public $custom_id;

    /**
     * @var string
     * The API caller-provided external invoice number for this order. Appears in both the payer's transaction
     * history and the emails that the payer receives.
     */
    public $invoice_id;

    /**
     * @var string
     * The soft descriptor is the dynamic text used to construct the statement descriptor that appears on a payer's
     * card statement.<br><br>If an Order is paid using the "PayPal Wallet", the statement descriptor will appear in
     * following format on the payer's card statement:
     * <code><var>PAYPAL_prefix</var>+(space)+<var>merchant_descriptor</var>+(space)+
     * <var>soft_descriptor</var></code><blockquote><strong>Note:</strong> The merchant descriptor is the descriptor
     * of the merchant’s payment receiving preferences which can be seen by logging into the merchant account
     * https://www.sandbox.paypal.com/businessprofile/settings/info/edit</blockquote>The <code>PAYPAL</code> prefix
     * uses 8 characters. Only the first 22 characters will be displayed in the statement. <br>For example,
     * if:<ul><li>The PayPal prefix toggle is <code>PAYPAL *</code>.</li><li>The merchant descriptor in the profile
     * is <code>Janes Gift</code>.</li><li>The soft descriptor is <code>800-123-1234</code>.</li></ul>Then, the
     * statement descriptor on the card is <code>PAYPAL * Janes Gift 80</code>.
     */
    public $soft_descriptor;

    /**
     * @var array<Item>
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
}
