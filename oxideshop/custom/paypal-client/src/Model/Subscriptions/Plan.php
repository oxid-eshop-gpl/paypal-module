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
     *
     * minLength: 3
     * maxLength: 50
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
     * The plan status.
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
     * The type of the plan, which indicates the billing pattern.
     *
     * use one of constants defined in this class to set the value:
     * @see USAGE_TYPE_LICENSED
     * @see USAGE_TYPE_METERED
     * minLength: 1
     * maxLength: 24
     */
    public $usage_type = 'LICENSED';

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
    public $quantity_supported = false;

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
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 3);
        assert(!isset($this->id) || strlen($this->id) <= 50);
        assert(!isset($this->product_id) || strlen($this->product_id) >= 6);
        assert(!isset($this->product_id) || strlen($this->product_id) <= 50);
        assert(!isset($this->name) || strlen($this->name) >= 1);
        assert(!isset($this->name) || strlen($this->name) <= 127);
        assert(!isset($this->status) || strlen($this->status) >= 1);
        assert(!isset($this->status) || strlen($this->status) <= 24);
        assert(!isset($this->description) || strlen($this->description) >= 1);
        assert(!isset($this->description) || strlen($this->description) <= 127);
        assert(!isset($this->usage_type) || strlen($this->usage_type) >= 1);
        assert(!isset($this->usage_type) || strlen($this->usage_type) <= 24);
        assert(isset($this->taxes));
        assert(!isset($this->create_time) || strlen($this->create_time) >= 20);
        assert(!isset($this->create_time) || strlen($this->create_time) <= 64);
        assert(!isset($this->update_time) || strlen($this->update_time) >= 20);
        assert(!isset($this->update_time) || strlen($this->update_time) <= 64);
    }
}
