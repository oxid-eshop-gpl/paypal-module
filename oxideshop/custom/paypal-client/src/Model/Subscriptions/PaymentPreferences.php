<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment preferences for a subscription.
 *
 * generated from: payment_preferences.json
 */
class PaymentPreferences implements JsonSerializable
{
    use BaseModel;

    /** A prepaid billing cycle. */
    const SERVICE_TYPE_PREPAID = 'PREPAID';

    /** A postpaid billing cycle. */
    const SERVICE_TYPE_POSTPAID = 'POSTPAID';

    /** Continues the subscription if the initial payment for the setup fails. */
    const SETUP_FEE_FAILURE_ACTION_CONTINUE = 'CONTINUE';

    /** Cancels the subscription if the initial payment for the setup fails. */
    const SETUP_FEE_FAILURE_ACTION_CANCEL = 'CANCEL';

    /**
     * @var string
     * A pre- or post-paid service.
     *
     * use one of constants defined in this class to set the value:
     * @see SERVICE_TYPE_PREPAID
     * @see SERVICE_TYPE_POSTPAID
     * minLength: 1
     * maxLength: 24
     */
    public $service_type;

    /**
     * @var boolean
     * Indicates whether to automatically bill the outstanding amount in the next billing cycle.
     */
    public $auto_bill_outstanding;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $setup_fee;

    /**
     * @var string
     * The action to take on the subscription if the initial payment for the setup fails.
     *
     * use one of constants defined in this class to set the value:
     * @see SETUP_FEE_FAILURE_ACTION_CONTINUE
     * @see SETUP_FEE_FAILURE_ACTION_CANCEL
     * minLength: 1
     * maxLength: 24
     */
    public $setup_fee_failure_action;

    /**
     * @var integer
     * The maximum number of payment failures before a subscription is suspended. For example, if
     * `payment_failure_threshold` is `2`, the subscription automatically updates to the `SUSPEND` state if two
     * consecutive payments fail.
     */
    public $payment_failure_threshold;

    public function validate()
    {
        assert(!isset($this->service_type) || strlen($this->service_type) >= 1);
        assert(!isset($this->service_type) || strlen($this->service_type) <= 24);
        assert(isset($this->setup_fee));
        assert(!isset($this->setup_fee_failure_action) || strlen($this->setup_fee_failure_action) >= 1);
        assert(!isset($this->setup_fee_failure_action) || strlen($this->setup_fee_failure_action) <= 24);
    }
}
