<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The information about the disputed transaction.
 *
 * generated from: response-transaction_info.json
 */
class TransactionInfo implements JsonSerializable
{
    use BaseModel;

    /** The transaction processing completed. */
    const TRANSACTION_STATUS_COMPLETED = 'COMPLETED';

    /** The items in the transaction are unclaimed. If they are not claimed within 30 days, the funds are returned to the sender. */
    const TRANSACTION_STATUS_UNCLAIMED = 'UNCLAIMED';

    /** The transaction was denied. */
    const TRANSACTION_STATUS_DENIED = 'DENIED';

    /** The transaction failed. */
    const TRANSACTION_STATUS_FAILED = 'FAILED';

    /** The transaction is on hold. */
    const TRANSACTION_STATUS_HELD = 'HELD';

    /** The transaction is waiting to be processed. */
    const TRANSACTION_STATUS_PENDING = 'PENDING';

    /** The payment for the transaction was partially refunded. */
    const TRANSACTION_STATUS_PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /** The payment for the transaction was successfully refunded. */
    const TRANSACTION_STATUS_REFUNDED = 'REFUNDED';

    /** The payment for the transaction was reversed due to a chargeback or other reversal type. */
    const TRANSACTION_STATUS_REVERSED = 'REVERSED';

    /** The transaction is cancelled. */
    const TRANSACTION_STATUS_CANCELLED = 'CANCELLED';

    /** Merchants are covered under seller protection provided they have responded with valid evidence. */
    const SELLER_PROTECTION_TYPE_EXPANDED_SELLER_PROTECTION = 'EXPANDED_SELLER_PROTECTION';

    /** Merchants are eligible for seller protection irrespective of them responding with the proof of shipment/delivery. */
    const SELLER_PROTECTION_TYPE_EFFORTLESS_SELLER_PROTECTION = 'EFFORTLESS_SELLER_PROTECTION';

    /** Merchants are protected in the subsequent case if an internal case is communicated as resolved in merchant favor. */
    const SELLER_PROTECTION_TYPE_DOUBLE_JEOPARDY_PROTECTION = 'DOUBLE_JEOPARDY_PROTECTION';

    /** Not applicable. */
    const PROVISIONAL_CREDIT_STATUS_NOT_APPLICABLE = 'NOT_APPLICABLE';

    /** The provisional credit was applied. */
    const PROVISIONAL_CREDIT_STATUS_APPLIED = 'APPLIED';

    /** The provisional credit was not applied. */
    const PROVISIONAL_CREDIT_STATUS_NOT_APPLIED = 'NOT_APPLIED';

    /** The provisional credit was refunded. */
    const PROVISIONAL_CREDIT_STATUS_REVERSED = 'REVERSED';

    /** The provisional credit in pending debit. */
    const PROVISIONAL_CREDIT_STATUS_PENDING_DEBIT = 'PENDING_DEBIT';

    /**
     * @var string
     * The ID, as seen by the customer, for this transaction.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $buyer_transaction_id;

    /**
     * @var string
     * The ID, as seen by the merchant, for this transaction.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $seller_transaction_id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The transaction status.
     *
     * use one of constants defined in this class to set the value:
     * @see TRANSACTION_STATUS_COMPLETED
     * @see TRANSACTION_STATUS_UNCLAIMED
     * @see TRANSACTION_STATUS_DENIED
     * @see TRANSACTION_STATUS_FAILED
     * @see TRANSACTION_STATUS_HELD
     * @see TRANSACTION_STATUS_PENDING
     * @see TRANSACTION_STATUS_PARTIALLY_REFUNDED
     * @see TRANSACTION_STATUS_REFUNDED
     * @see TRANSACTION_STATUS_REVERSED
     * @see TRANSACTION_STATUS_CANCELLED
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $gross_amount;

    /**
     * @var string
     * The ID of the invoice for the payment.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_number;

    /**
     * @var string
     * A free-text field that is entered by the merchant during checkout.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $custom;

    /**
     * @var Buyer
     * The details for the customer who funds the payment. For example, the customer's first name, last name, and
     * email address.
     */
    public $buyer;

    /**
     * @var Seller
     * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and
     * contact email address.
     */
    public $seller;

    /**
     * @var Facilitator
     * A resource representing a Facilitator/Partner who facilitates a transaction.
     */
    public $facilitator;

    /**
     * @var array<ItemInfo>
     * An array of items that were purchased as part of the transaction.
     */
    public $items;

    /**
     * @var boolean
     * Indicates whether the merchant is eligible for protection on the disputed transaction.
     */
    public $seller_protection_eligible;

    /**
     * @var string
     * Indicates the type of protection the merchant is eligible on the disputed transaction.
     *
     * use one of constants defined in this class to set the value:
     * @see SELLER_PROTECTION_TYPE_EXPANDED_SELLER_PROTECTION
     * @see SELLER_PROTECTION_TYPE_EFFORTLESS_SELLER_PROTECTION
     * @see SELLER_PROTECTION_TYPE_DOUBLE_JEOPARDY_PROTECTION
     * minLength: 1
     * maxLength: 255
     */
    public $seller_protection_type;

    /**
     * @var RegulationInfo
     * The details for the regulation under which the transaction is covered.
     */
    public $regulation_info;

    /**
     * @var string
     * The provisional credit status.
     *
     * use one of constants defined in this class to set the value:
     * @see PROVISIONAL_CREDIT_STATUS_NOT_APPLICABLE
     * @see PROVISIONAL_CREDIT_STATUS_APPLIED
     * @see PROVISIONAL_CREDIT_STATUS_NOT_APPLIED
     * @see PROVISIONAL_CREDIT_STATUS_REVERSED
     * @see PROVISIONAL_CREDIT_STATUS_PENDING_DEBIT
     * minLength: 1
     * maxLength: 255
     */
    public $provisional_credit_status;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->buyer_transaction_id) || Assert::minLength($this->buyer_transaction_id, 1, "buyer_transaction_id in TransactionInfo must have minlength of 1 $within");
        !isset($this->buyer_transaction_id) || Assert::maxLength($this->buyer_transaction_id, 255, "buyer_transaction_id in TransactionInfo must have maxlength of 255 $within");
        !isset($this->seller_transaction_id) || Assert::minLength($this->seller_transaction_id, 1, "seller_transaction_id in TransactionInfo must have minlength of 1 $within");
        !isset($this->seller_transaction_id) || Assert::maxLength($this->seller_transaction_id, 255, "seller_transaction_id in TransactionInfo must have maxlength of 255 $within");
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in TransactionInfo must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in TransactionInfo must have maxlength of 64 $within");
        !isset($this->transaction_status) || Assert::minLength($this->transaction_status, 1, "transaction_status in TransactionInfo must have minlength of 1 $within");
        !isset($this->transaction_status) || Assert::maxLength($this->transaction_status, 255, "transaction_status in TransactionInfo must have maxlength of 255 $within");
        !isset($this->gross_amount) || Assert::isInstanceOf($this->gross_amount, Money::class, "gross_amount in TransactionInfo must be instance of Money $within");
        !isset($this->gross_amount) || $this->gross_amount->validate(TransactionInfo::class);
        !isset($this->invoice_number) || Assert::minLength($this->invoice_number, 1, "invoice_number in TransactionInfo must have minlength of 1 $within");
        !isset($this->invoice_number) || Assert::maxLength($this->invoice_number, 127, "invoice_number in TransactionInfo must have maxlength of 127 $within");
        !isset($this->custom) || Assert::minLength($this->custom, 1, "custom in TransactionInfo must have minlength of 1 $within");
        !isset($this->custom) || Assert::maxLength($this->custom, 2000, "custom in TransactionInfo must have maxlength of 2000 $within");
        !isset($this->buyer) || Assert::isInstanceOf($this->buyer, Buyer::class, "buyer in TransactionInfo must be instance of Buyer $within");
        !isset($this->buyer) || $this->buyer->validate(TransactionInfo::class);
        !isset($this->seller) || Assert::isInstanceOf($this->seller, Seller::class, "seller in TransactionInfo must be instance of Seller $within");
        !isset($this->seller) || $this->seller->validate(TransactionInfo::class);
        !isset($this->facilitator) || Assert::isInstanceOf($this->facilitator, Facilitator::class, "facilitator in TransactionInfo must be instance of Facilitator $within");
        !isset($this->facilitator) || $this->facilitator->validate(TransactionInfo::class);
        !isset($this->items) || Assert::isArray($this->items, "items in TransactionInfo must be array $within");

                                if (isset($this->items)){
                                    foreach ($this->items as $item) {
                                        $item->validate(TransactionInfo::class);
                                    }
                                }

        !isset($this->seller_protection_type) || Assert::minLength($this->seller_protection_type, 1, "seller_protection_type in TransactionInfo must have minlength of 1 $within");
        !isset($this->seller_protection_type) || Assert::maxLength($this->seller_protection_type, 255, "seller_protection_type in TransactionInfo must have maxlength of 255 $within");
        !isset($this->regulation_info) || Assert::isInstanceOf($this->regulation_info, RegulationInfo::class, "regulation_info in TransactionInfo must be instance of RegulationInfo $within");
        !isset($this->regulation_info) || $this->regulation_info->validate(TransactionInfo::class);
        !isset($this->provisional_credit_status) || Assert::minLength($this->provisional_credit_status, 1, "provisional_credit_status in TransactionInfo must have minlength of 1 $within");
        !isset($this->provisional_credit_status) || Assert::maxLength($this->provisional_credit_status, 255, "provisional_credit_status in TransactionInfo must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
