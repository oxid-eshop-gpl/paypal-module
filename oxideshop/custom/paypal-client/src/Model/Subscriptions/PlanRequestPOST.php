<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The create plan request details.
 *
 * generated from: plan_request_POST.json
 */
class PlanRequestPOST implements JsonSerializable
{
    use BaseModel;

    /** The plan was created. You cannot create subscriptions for a plan in this state. */
    const STATUS_CREATED = 'CREATED';

    /** The plan is inactive. */
    const STATUS_INACTIVE = 'INACTIVE';

    /** The plan is active. You can only create subscriptions for a plan in this state. */
    const STATUS_ACTIVE = 'ACTIVE';

    /** A licensed plan. Has a fixed billing amount. */
    const USAGE_TYPE_LICENSED = 'LICENSED';

    /** A metered plan. Billed based on service consumption. */
    const USAGE_TYPE_METERED = 'METERED';

    /**
     * @var string
     * The ID of the product.
     *
     * minLength: 6
     * maxLength: 50
     */
    public $product_id;

    /**
     * @var string
     * The plan name.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * @var string
     * The initial state of the plan. Allowed input values are CREATED and ACTIVE.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_INACTIVE
     * @see STATUS_ACTIVE
     * minLength: 1
     * maxLength: 24
     */
    public $status;

    /**
     * @var string
     * The detailed description of the plan.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $description;

    /**
     * @var string
     * The plan type, which indicates the billing pattern.
     *
     * use one of constants defined in this class to set the value:
     * @see USAGE_TYPE_LICENSED
     * @see USAGE_TYPE_METERED
     * minLength: 1
     * maxLength: 24
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
}
