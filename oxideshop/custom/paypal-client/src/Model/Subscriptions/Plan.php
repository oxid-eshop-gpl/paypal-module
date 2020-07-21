<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The plan details.
 */
class Plan implements \JsonSerializable
{
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

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
