<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The billing issue details.
 *
 * generated from: response-billing_disputes_properties.json
 */
class BillingDisputesProperties implements JsonSerializable
{
    use BaseModel;

    /**
     * The duplicate transaction details.
     *
     * @var DuplicateTransaction | null
     */
    public $duplicate_transaction;

    /**
     * The incorrect transaction amount details.
     *
     * @var IncorrectTransactionAmount | null
     */
    public $incorrect_transaction_amount;

    /**
     * The payment by other means details.
     *
     * @var PaymentByOtherMeans | null
     */
    public $payment_by_other_means;

    /**
     * The credit not processed details.
     *
     * @var CreditNotProcessed | null
     */
    public $credit_not_processed;

    /**
     * The recurring billing canceled details.
     *
     * @var CanceledRecurringBilling | null
     */
    public $canceled_recurring_billing;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->duplicate_transaction) || Assert::isInstanceOf(
            $this->duplicate_transaction,
            DuplicateTransaction::class,
            "duplicate_transaction in BillingDisputesProperties must be instance of DuplicateTransaction $within"
        );
        !isset($this->duplicate_transaction) ||  $this->duplicate_transaction->validate(BillingDisputesProperties::class);
        !isset($this->incorrect_transaction_amount) || Assert::isInstanceOf(
            $this->incorrect_transaction_amount,
            IncorrectTransactionAmount::class,
            "incorrect_transaction_amount in BillingDisputesProperties must be instance of IncorrectTransactionAmount $within"
        );
        !isset($this->incorrect_transaction_amount) ||  $this->incorrect_transaction_amount->validate(BillingDisputesProperties::class);
        !isset($this->payment_by_other_means) || Assert::isInstanceOf(
            $this->payment_by_other_means,
            PaymentByOtherMeans::class,
            "payment_by_other_means in BillingDisputesProperties must be instance of PaymentByOtherMeans $within"
        );
        !isset($this->payment_by_other_means) ||  $this->payment_by_other_means->validate(BillingDisputesProperties::class);
        !isset($this->credit_not_processed) || Assert::isInstanceOf(
            $this->credit_not_processed,
            CreditNotProcessed::class,
            "credit_not_processed in BillingDisputesProperties must be instance of CreditNotProcessed $within"
        );
        !isset($this->credit_not_processed) ||  $this->credit_not_processed->validate(BillingDisputesProperties::class);
        !isset($this->canceled_recurring_billing) || Assert::isInstanceOf(
            $this->canceled_recurring_billing,
            CanceledRecurringBilling::class,
            "canceled_recurring_billing in BillingDisputesProperties must be instance of CanceledRecurringBilling $within"
        );
        !isset($this->canceled_recurring_billing) ||  $this->canceled_recurring_billing->validate(BillingDisputesProperties::class);
    }

    private function map(array $data)
    {
        if (isset($data['duplicate_transaction'])) {
            $this->duplicate_transaction = new DuplicateTransaction($data['duplicate_transaction']);
        }
        if (isset($data['incorrect_transaction_amount'])) {
            $this->incorrect_transaction_amount = new IncorrectTransactionAmount($data['incorrect_transaction_amount']);
        }
        if (isset($data['payment_by_other_means'])) {
            $this->payment_by_other_means = new PaymentByOtherMeans($data['payment_by_other_means']);
        }
        if (isset($data['credit_not_processed'])) {
            $this->credit_not_processed = new CreditNotProcessed($data['credit_not_processed']);
        }
        if (isset($data['canceled_recurring_billing'])) {
            $this->canceled_recurring_billing = new CanceledRecurringBilling($data['canceled_recurring_billing']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
