<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
 *
 * generated from: amount_with_breakdown.json
 */
class AmountWithBreakdown implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $gross_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $fee_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $tax_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $net_amount;

    public function validate()
    {
        assert(isset($this->gross_amount));
        assert(isset($this->fee_amount));
        assert(isset($this->shipping_amount));
        assert(isset($this->tax_amount));
        assert(isset($this->net_amount));
    }
}
