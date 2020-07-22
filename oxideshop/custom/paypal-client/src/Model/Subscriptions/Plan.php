<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The plan details.
 *
 * generated from: plan.json
 */
class Plan implements JsonSerializable
{
    use BaseModel;

    /** The plan was created. You cannot create subscriptions for a plan in this state. */
    const STATUS_CREATED = 'CREATED';

    /** The plan is inactive. */
    const STATUS_INACTIVE = 'INACTIVE';

    /** The plan is active. You can only create subscriptions for a plan in this state. */
    const STATUS_ACTIVE = 'ACTIVE';

    /** A licensed plan. */
    const USAGE_TYPE_LICENSED = 'LICENSED';

    /** A metered plan. */
    const USAGE_TYPE_METERED = 'METERED';

    /**
     * @var string
     * The unique PayPal-generated ID for the plan.
     */
    public $id;

    /**
     * @var integer
     * The version of the plan.
     */
    public $version;

    /**
     * @var string
     * The ID for the product.
     */
    public $product_id;

    /**
     * @var string
     * The plan name.
     */
    public $name;

    /**
     * @var string
     * The plan status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_INACTIVE
     * @see STATUS_ACTIVE
     */
    public $status;

    /**
     * @var string
     * The detailed description of the plan.
     */
    public $description;

    /**
     * @var string
     * The type of the plan, which indicates the billing pattern.
     *
     * use one of constants defined in this class to set the value:
     * @see USAGE_TYPE_LICENSED
     * @see USAGE_TYPE_METERED
     */
    public $usage_type;

    /**
     * @var array<BillingCycle>
     * An array of billing cycles for trial billing and regular billing. A plan can have at most two trial cycles and
     * only one regular cycle.
     */
    public $billing_cycles;

    /**
     * @var PaymentPreferences
     * The payment preferences for a subscription.
     */
    public $payment_preferences;

    /**
     * @var Taxes
     * The tax details.
     */
    public $taxes;

    /**
     * @var boolean
     * Indicates whether you can subscribe to this plan by providing a quantity for the goods or service.
     */
    public $quantity_supported;

    /**
     * @var Payee
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     */
    public $payee;

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
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;
}
