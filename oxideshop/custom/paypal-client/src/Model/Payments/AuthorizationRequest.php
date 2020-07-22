<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Authorizes either a portion or the full amount of a saved order.
 *
 * generated from: authorization_request.json
 */
class AuthorizationRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
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

    /** @var string */
    public $description;

    /** @var string */
    public $custom_id;

    /** @var string */
    public $invoice_id;

    /** @var array<Item> */
    public $items;

    /**
     * @var ShippingDetail
     * The shipping details.
     */
    public $shipping;
}
