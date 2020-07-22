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

    /** @var string */
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

    /** @var string */
    public $transaction_id;

    /** @var string */
    public $payout_type;

    /** @var boolean */
    public $seller_protection_eligible;

    /** @var string */
    public $transaction_source;
}
