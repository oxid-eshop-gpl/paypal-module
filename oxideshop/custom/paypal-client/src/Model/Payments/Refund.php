<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The refund information.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-refund.json
 */
class Refund extends RefundStatus implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The PayPal-generated ID for the refund.
     */
    public $id;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var string
     * The API caller-provided external invoice number for this order. Appears in both the payer's transaction
     * history and the emails that the payer receives.
     */
    public $invoice_id;

    /**
     * @var string
     * The reason for the refund. Appears in both the payer's transaction history and the emails that the payer
     * receives.
     */
    public $note_to_payer;

    /**
     * @var RefundSellerPayableBreakdown
     * The breakdown of the refund.
     */
    public $seller_payable_breakdown;

    /**
     * @var array<array>
     * An array of related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;

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
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within Refund $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within Refund $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in Refund must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(Refund::class);
        !isset($this->seller_payable_breakdown) || Assert::isInstanceOf($this->seller_payable_breakdown, RefundSellerPayableBreakdown::class, "seller_payable_breakdown in Refund must be instance of RefundSellerPayableBreakdown $within");
        !isset($this->seller_payable_breakdown) || $this->seller_payable_breakdown->validate(Refund::class);
        !isset($this->links) || Assert::isArray($this->links, "links in Refund must be array $within");
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in Refund must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in Refund must have maxlength of 64 $within");
        !isset($this->update_time) || Assert::minLength($this->update_time, 20, "update_time in Refund must have minlength of 20 $within");
        !isset($this->update_time) || Assert::maxLength($this->update_time, 64, "update_time in Refund must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
