<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\Money;
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
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $expected_refund;

    /**
     * The cancellation details.
     *
     * @var CancellationDetails | null
     */
    public $cancellation_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->expected_refund) || Assert::isInstanceOf(
            $this->expected_refund,
            Money::class,
            "expected_refund in CanceledRecurringBilling must be instance of Money $within"
        );
        !isset($this->expected_refund) ||  $this->expected_refund->validate(CanceledRecurringBilling::class);
        !isset($this->cancellation_details) || Assert::isInstanceOf(
            $this->cancellation_details,
            CancellationDetails::class,
            "cancellation_details in CanceledRecurringBilling must be instance of CancellationDetails $within"
        );
        !isset($this->cancellation_details) ||  $this->cancellation_details->validate(CanceledRecurringBilling::class);
    }

    private function map(array $data)
    {
        if (isset($data['expected_refund'])) {
            $this->expected_refund = new Money($data['expected_refund']);
        }
        if (isset($data['cancellation_details'])) {
            $this->cancellation_details = new CancellationDetails($data['cancellation_details']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
