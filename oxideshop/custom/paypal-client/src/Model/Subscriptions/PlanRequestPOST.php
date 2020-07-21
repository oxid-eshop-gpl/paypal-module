<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The create plan request details.
 */
class PlanRequestPOST implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $product_id;

    /** @var string */
    public $name;

    /** @var string */
    public $status;

    /** @var string */
    public $description;

    /** @var string */
    public $usage_type;

    /** @var array<BillingCycle> */
    public $billing_cycles;

    /** @var PaymentPreferences */
    public $payment_preferences;

    /** @var Taxes */
    public $taxes;

    /** @var boolean */
    public $quantity_supported;
}
