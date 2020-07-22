<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The recurring billing canceled details.
 *
 * generated from: response-canceled_recurring_billing.json
 */
class CanceledRecurringBilling implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $expected_refund;

    /**
     * @var CancellationDetails
     * The cancellation details.
     */
    public $cancellation_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->expected_refund) || Assert::notNull($this->expected_refund->currency_code, "currency_code in expected_refund must not be NULL within CanceledRecurringBilling $within");
        !isset($this->expected_refund) || Assert::notNull($this->expected_refund->value, "value in expected_refund must not be NULL within CanceledRecurringBilling $within");
        !isset($this->expected_refund) || Assert::isInstanceOf($this->expected_refund, Money::class, "expected_refund in CanceledRecurringBilling must be instance of Money $within");
        !isset($this->expected_refund) || $this->expected_refund->validate(CanceledRecurringBilling::class);
        !isset($this->cancellation_details) || Assert::isInstanceOf($this->cancellation_details, CancellationDetails::class, "cancellation_details in CanceledRecurringBilling must be instance of CancellationDetails $within");
        !isset($this->cancellation_details) || $this->cancellation_details->validate(CanceledRecurringBilling::class);
    }

    public function __construct()
    {
    }
}
