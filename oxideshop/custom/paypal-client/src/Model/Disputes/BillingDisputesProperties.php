<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
}
