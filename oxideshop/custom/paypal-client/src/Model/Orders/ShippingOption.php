<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The options that the payee or merchant offers to the payer to ship or pick up their items.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-shipping_option.json
 */
class ShippingOption implements JsonSerializable
{
    use BaseModel;

    /** The payer intends to receive the items at a specified address. */
    const TYPE_SHIPPING = 'SHIPPING';

    /** The payer intends to pick up the items at a specified address. For example, a store address. */
    const TYPE_PICKUP = 'PICKUP';

    /**
     * @var string
     * A unique ID that identifies a payer-selected shipping option.
     *
     * maxLength: 127
     */
    public $id;

    /**
     * @var string
     * A description that the payer sees, which helps them choose an appropriate shipping option. For example, `Free
     * Shipping`, `USPS Priority Shipping`, `Expédition prioritaire USPS`, or `USPS yōuxiān fā huò`. Localize
     * this description to the payer's locale.
     *
     * maxLength: 127
     */
    public $label;

    /**
     * @var string
     * The method by which the payer wants to get their items.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SHIPPING
     * @see TYPE_PICKUP
     */
    public $type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var boolean
     * If the API request sets `selected = true`, it represents the shipping option that the payee or merchant
     * expects to be pre-selected for the payer when they first view the `shipping.options` in the PayPal Checkout
     * experience. As part of the response if a `shipping.option` contains `selected=true`, it represents the
     * shipping option that the payer selected during the course of checkout with PayPal. Only one `shipping.option`
     * can be set to `selected=true`.
     */
    public $selected;
}
