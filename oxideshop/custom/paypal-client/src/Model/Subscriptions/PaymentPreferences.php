<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The payment preferences for a subscription.
 */
class PaymentPreferences implements \JsonSerializable
{
    /** @var string */
    public $service_type;

    /** @var boolean */
    public $auto_bill_outstanding;

    /** @var Money */
    public $setup_fee;

    /** @var string */
    public $setup_fee_failure_action;

    /** @var integer */
    public $payment_failure_threshold;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
