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

    /** The merchant intends to capture payment immediately after the customer makes a payment. */
    const INTENT_CAPTURE = 'CAPTURE';

    /** The merchant intends to authorize a payment and place funds on hold after the customer makes a payment. Authorized payments are guaranteed for up to three days but are available to capture for up to 29 days. After the three-day honor period, the original authorized payment expires and you must re-authorize the payment. You must make a separate request to capture payments on demand. This intent is not supported when you have more than one `purchase_unit` within your order. */
    const INTENT_AUTHORIZE = 'AUTHORIZE';

    /** The order was created with the specified context. */
    const STATUS_CREATED = 'CREATED';

    /** The order was saved and persisted. The order status continues to be in progress until a capture is made with <code>final_capture = true</code> for all purchase units within the order. */
    const STATUS_SAVED = 'SAVED';

    /** The customer approved the payment through the PayPal wallet or another form of guest or unbranded payment. For example, a card, bank account, or so on. */
    const STATUS_APPROVED = 'APPROVED';

    /** All purchase units in the order are voided. */
    const STATUS_VOIDED = 'VOIDED';

    /** The payment was authorized or the authorized payment was captured for the order. */
    const STATUS_COMPLETED = 'COMPLETED';

    /** The order requires an action from the payer (e.g. 3DS authentication). Redirect the payer to the "rel":"payer_action" HATEOAS link returned as part of the response prior to authorizing or capturing the order. */
    const STATUS_PAYER_ACTION_REQUIRED = 'PAYER_ACTION_REQUIRED';

    /** Some of the 'purchase_units' within the Order could not be successfully authorized or captured. This status is only applicable if you have multiple 'purchase_units' for an order. */
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
