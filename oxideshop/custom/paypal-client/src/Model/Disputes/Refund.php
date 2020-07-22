<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund details.
 *
 * generated from: response-refund.json
 */
class Refund implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $gross_amount;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $transaction_time;

    /**
     * @var string
     * The ID of the transaction for the refund, as it appears to the merchant.
     */
    public $transaction_id;

    /**
     * @var string
     * The ID of the invoice for the refund.
     */
    public $invoice_number;
}
