<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Authorizes either a portion or the full amount of a saved order.
 *
 * generated from: authorization_request.json
 */
class AuthorizationRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The identifier of the order for this authorization.
     */
    public $order_id;

    /**
     * @var PaymentSource
     * The payment source definition.
     */
    public $payment_source;

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
     * @var string
     * Description of the authorization transaction.
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
     * @var array<Item>
     * An array of items that the customer purchases from the merchant.
     */
    public $items;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_source) || Assert::isInstanceOf($this->payment_source, PaymentSource::class, "payment_source in AuthorizationRequest must be instance of PaymentSource $within");
        !isset($this->payment_source) || $this->payment_source->validate(AuthorizationRequest::class);
        !isset($this->amount) || Assert::isInstanceOf($this->amount, AmountWithBreakdown::class, "amount in AuthorizationRequest must be instance of AmountWithBreakdown $within");
        !isset($this->amount) || $this->amount->validate(AuthorizationRequest::class);
        !isset($this->payee) || Assert::isInstanceOf($this->payee, Payee::class, "payee in AuthorizationRequest must be instance of Payee $within");
        !isset($this->payee) || $this->payee->validate(AuthorizationRequest::class);
        !isset($this->description) || Assert::maxLength($this->description, 127, "description in AuthorizationRequest must have maxlength of 127 $within");
        !isset($this->custom_id) || Assert::maxLength($this->custom_id, 127, "custom_id in AuthorizationRequest must have maxlength of 127 $within");
        !isset($this->invoice_id) || Assert::maxLength($this->invoice_id, 127, "invoice_id in AuthorizationRequest must have maxlength of 127 $within");
        !isset($this->items) || Assert::isArray($this->items, "items in AuthorizationRequest must be array $within");

                                if (isset($this->items)){
                                    foreach ($this->items as $item) {
                                        $item->validate(AuthorizationRequest::class);
                                    }
                                }

        !isset($this->shipping) || Assert::isInstanceOf($this->shipping, ShippingDetail::class, "shipping in AuthorizationRequest must be instance of ShippingDetail $within");
        !isset($this->shipping) || $this->shipping->validate(AuthorizationRequest::class);
    }

    public function __construct()
    {
    }
}
