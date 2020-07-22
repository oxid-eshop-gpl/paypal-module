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
     *
     * minLength: 20
     * maxLength: 64
     */
    public $transaction_time;

    /**
     * @var string
     * The ID of the transaction for the refund, as it appears to the merchant.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_id;

    /**
     * @var string
     * The ID of the invoice for the refund.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_number;

    public function validate()
    {
        assert(isset($this->gross_amount));
        assert(!isset($this->transaction_time) || strlen($this->transaction_time) >= 20);
        assert(!isset($this->transaction_time) || strlen($this->transaction_time) <= 64);
        assert(!isset($this->transaction_id) || strlen($this->transaction_id) >= 1);
        assert(!isset($this->transaction_id) || strlen($this->transaction_id) <= 255);
        assert(!isset($this->invoice_number) || strlen($this->invoice_number) >= 1);
        assert(!isset($this->invoice_number) || strlen($this->invoice_number) <= 127);
    }
}
