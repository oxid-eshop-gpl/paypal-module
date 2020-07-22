<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payout details for the referred dispute.
 *
 * generated from: referred-refund_info.json
 */
class RefundInfo implements JsonSerializable
{
    use BaseModel;

    /** The customer received the refund. */
    const RECIPIENT_BUYER = 'BUYER';

    /** The merchant received the refund. */
    const RECIPIENT_SELLER = 'SELLER';

    /** The payout was made with the reversal of the original transaction, from the merchant to the customer. */
    const PAYOUT_TYPE_REVERSAL = 'REVERSAL';

    /** The payout was made through a courtesy credit. */
    const PAYOUT_TYPE_COURTESY_CREDIT = 'COURTESY_CREDIT';

    /** The payout was made through Seller Protection coverage. */
    const PAYOUT_TYPE_SELLER_PROTECTION_COVERAGE = 'SELLER_PROTECTION_COVERAGE';

    /** The transaction occurred on PayPal. */
    const TRANSACTION_SOURCE_PAYPAL = 'PAYPAL';

    /** The transaction occurred on a third-party site other than PayPal. */
    const TRANSACTION_SOURCE_OTHER = 'OTHER';

    /**
     * @var string
     * The payout recipient information.
     *
     * use one of constants defined in this class to set the value:
     * @see RECIPIENT_BUYER
     * @see RECIPIENT_SELLER
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 255
     */
    public $recipient;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * this is mandatory to be set
     */
    public $amount;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * this is mandatory to be set
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The encrypted transaction ID, if available.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_id;

    /**
     * @var string
     * The type of payout.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYOUT_TYPE_REVERSAL
     * @see PAYOUT_TYPE_COURTESY_CREDIT
     * @see PAYOUT_TYPE_SELLER_PROTECTION_COVERAGE
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 255
     */
    public $payout_type;

    /**
     * @var boolean
     * Indicates whether the merchant is eligible for protection on the disputed transaction.
     *
     * this is mandatory to be set
     */
    public $seller_protection_eligible;

    /**
     * @var string
     * The site where the transaction occurred.
     *
     * use one of constants defined in this class to set the value:
     * @see TRANSACTION_SOURCE_PAYPAL
     * @see TRANSACTION_SOURCE_OTHER
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_source;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->recipient, "recipient in RefundInfo must not be NULL $within");
         Assert::minLength($this->recipient, 1, "recipient in RefundInfo must have minlength of 1 $within");
         Assert::maxLength($this->recipient, 255, "recipient in RefundInfo must have maxlength of 255 $within");
        Assert::notNull($this->amount, "amount in RefundInfo must not be NULL $within");
         Assert::isInstanceOf($this->amount, Money::class, "amount in RefundInfo must be instance of Money $within");
         $this->amount->validate(RefundInfo::class);
        Assert::notNull($this->create_time, "create_time in RefundInfo must not be NULL $within");
         Assert::minLength($this->create_time, 20, "create_time in RefundInfo must have minlength of 20 $within");
         Assert::maxLength($this->create_time, 64, "create_time in RefundInfo must have maxlength of 64 $within");
        !isset($this->transaction_id) || Assert::minLength($this->transaction_id, 1, "transaction_id in RefundInfo must have minlength of 1 $within");
        !isset($this->transaction_id) || Assert::maxLength($this->transaction_id, 255, "transaction_id in RefundInfo must have maxlength of 255 $within");
        Assert::notNull($this->payout_type, "payout_type in RefundInfo must not be NULL $within");
         Assert::minLength($this->payout_type, 1, "payout_type in RefundInfo must have minlength of 1 $within");
         Assert::maxLength($this->payout_type, 255, "payout_type in RefundInfo must have maxlength of 255 $within");
        Assert::notNull($this->seller_protection_eligible, "seller_protection_eligible in RefundInfo must not be NULL $within");
        Assert::notNull($this->transaction_source, "transaction_source in RefundInfo must not be NULL $within");
         Assert::minLength($this->transaction_source, 1, "transaction_source in RefundInfo must have minlength of 1 $within");
         Assert::maxLength($this->transaction_source, 255, "transaction_source in RefundInfo must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
