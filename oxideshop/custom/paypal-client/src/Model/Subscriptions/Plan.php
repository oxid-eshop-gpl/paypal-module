<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The plan details.
 */
class Plan implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var integer */
    public $version;

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

    /** @var array */
    public $billing_cycles;

    /** @var PaymentPreferences */
    public $payment_preferences;

    /** @var Taxes */
    public $taxes;

    /** @var boolean */
    public $quantity_supported;

    /** @var Payee */
    public $payee;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    /** @var array */
    public $links;
}
