<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund information.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-refund.json
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
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $update_time;
}
