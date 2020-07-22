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
     * @var DuplicateTransaction
     * The duplicate transaction details.
     */
    public $duplicate_transaction;

    /**
     * @var IncorrectTransactionAmount
     * The incorrect transaction amount details.
     */
    public $incorrect_transaction_amount;

    /**
     * @var PaymentByOtherMeans
     * The payment by other means details.
     */
    public $payment_by_other_means;

    /**
     * @var CreditNotProcessed
     * The credit not processed details.
     */
    public $credit_not_processed;

    /**
     * @var CanceledRecurringBilling
     * The recurring billing canceled details.
     */
    public $canceled_recurring_billing;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->duplicate_transaction) || Assert::isInstanceOf($this->duplicate_transaction, DuplicateTransaction::class, "duplicate_transaction in BillingDisputesProperties must be instance of DuplicateTransaction $within");
        !isset($this->duplicate_transaction) || $this->duplicate_transaction->validate(BillingDisputesProperties::class);
        !isset($this->incorrect_transaction_amount) || Assert::isInstanceOf($this->incorrect_transaction_amount, IncorrectTransactionAmount::class, "incorrect_transaction_amount in BillingDisputesProperties must be instance of IncorrectTransactionAmount $within");
        !isset($this->incorrect_transaction_amount) || $this->incorrect_transaction_amount->validate(BillingDisputesProperties::class);
        !isset($this->payment_by_other_means) || Assert::isInstanceOf($this->payment_by_other_means, PaymentByOtherMeans::class, "payment_by_other_means in BillingDisputesProperties must be instance of PaymentByOtherMeans $within");
        !isset($this->payment_by_other_means) || $this->payment_by_other_means->validate(BillingDisputesProperties::class);
        !isset($this->credit_not_processed) || Assert::isInstanceOf($this->credit_not_processed, CreditNotProcessed::class, "credit_not_processed in BillingDisputesProperties must be instance of CreditNotProcessed $within");
        !isset($this->credit_not_processed) || $this->credit_not_processed->validate(BillingDisputesProperties::class);
        !isset($this->canceled_recurring_billing) || Assert::isInstanceOf($this->canceled_recurring_billing, CanceledRecurringBilling::class, "canceled_recurring_billing in BillingDisputesProperties must be instance of CanceledRecurringBilling $within");
        !isset($this->canceled_recurring_billing) || $this->canceled_recurring_billing->validate(BillingDisputesProperties::class);
    }

    public function __construct()
    {
    }
}
