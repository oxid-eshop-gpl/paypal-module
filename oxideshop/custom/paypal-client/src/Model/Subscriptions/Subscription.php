<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subscription details.
 */
class Subscription extends SubscriptionStatus implements JsonSerializable
{
    use BaseModel;

    /** PayPal currency conversion. */
    const PREFERRED_CURRENCY_CONVERSION_PAYPAL = 'PAYPAL';

    /** Vendor currency conversion. */
    const PREFERRED_CURRENCY_CONVERSION_VENDOR = 'VENDOR';

    /** @var string */
    public $id;

    /** @var string */
    public $plan_id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $start_time;

    /** @var string */
    public $quantity;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_amount;

    /**
     * @var Payee
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     */
    public $payee;

    /**
     * @var Subscriber
     * The subscriber response information.
     */
    public $subscriber;

    /**
     * @var SubscriptionBillingInfo
     * The billing details for the subscription. If the subscription was or is active, these fields are populated.
     */
    public $billing_info;

    /** @var boolean */
    public $auto_renewal;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $update_time;

    /**
     * @var string
     * The list of currency conversion providers.
     *
     * use one of constants defined in this class to set the value:
     * @see PREFERRED_CURRENCY_CONVERSION_PAYPAL
     * @see PREFERRED_CURRENCY_CONVERSION_VENDOR
     */
    public $preferred_currency_conversion;

    /**
     * @var FundingInstrumentResponse
     * The customer's funding instrument. Returned as a funding option to external entities.
     */
    public $preferred_funding_source;

    /** @var array<array> */
    public $links;
}
