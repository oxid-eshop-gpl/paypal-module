<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The order details.
 */
class Order extends ActivityTimestamps implements JsonSerializable
{
    use BaseModel;

    const INTENT_CAPTURE = 'CAPTURE';
    const INTENT_AUTHORIZE = 'AUTHORIZE';
    const STATUS_CREATED = 'CREATED';
    const STATUS_SAVED = 'SAVED';
    const STATUS_APPROVED = 'APPROVED';
    const STATUS_VOIDED = 'VOIDED';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_PAYER_ACTION_REQUIRED = 'PAYER_ACTION_REQUIRED';
    const STATUS_PARTIALLY_COMPLETED = 'PARTIALLY_COMPLETED';

    /** @var string */
    public $id;

    /**
     * @var PaymentSourceResponse
     * The payment source used to fund the payment
     */
    public $payment_source;

    /**
     * @var string
     * The intent to either capture payment immediately or authorize a payment for an order after order creation.
     *
     * use one of constants defined in this class to set the value:
     * @see INTENT_CAPTURE
     * @see INTENT_AUTHORIZE
     */
    public $intent;

    /**
     * @var Payer
     * The customer who approves and pays for the order. The customer is also known as the payer.
     */
    public $payer;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $expiration_time;

    /** @var array<PurchaseUnit> */
    public $purchase_units;

    /**
     * @var string
     * The order status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_SAVED
     * @see STATUS_APPROVED
     * @see STATUS_VOIDED
     * @see STATUS_COMPLETED
     * @see STATUS_PAYER_ACTION_REQUIRED
     * @see STATUS_PARTIALLY_COMPLETED
     */
    public $status;

    /** @var array<array> */
    public $links;

    /**
     * @var CreditFinancingOffer
     * The details about the payer-selected credit financing offer.
     */
    public $credit_financing_offer;
}
