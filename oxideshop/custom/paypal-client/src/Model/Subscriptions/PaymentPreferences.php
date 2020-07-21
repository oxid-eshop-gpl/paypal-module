<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment preferences for a subscription.
 */
class PaymentPreferences implements \JsonSerializable
{
    use BaseModel;

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
}
