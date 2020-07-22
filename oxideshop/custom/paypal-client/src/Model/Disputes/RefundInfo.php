<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $recipient;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var string
     * The encrypted transaction ID, if available.
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
     */
    public $payout_type;

    /**
     * @var boolean
     * Indicates whether the merchant is eligible for protection on the disputed transaction.
     */
    public $seller_protection_eligible;

    /**
     * @var string
     * The site where the transaction occurred.
     *
     * use one of constants defined in this class to set the value:
     * @see TRANSACTION_SOURCE_PAYPAL
     * @see TRANSACTION_SOURCE_OTHER
     */
    public $transaction_source;
}
