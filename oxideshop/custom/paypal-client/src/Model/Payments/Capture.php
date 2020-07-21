<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A captured payment.
 */
class Capture extends CaptureStatus implements JsonSerializable
{
    use BaseModel;

    const DISBURSEMENT_MODE_INSTANT = 'INSTANT';
    const DISBURSEMENT_MODE_DELAYED = 'DELAYED';

    /** @var string */
    public $id;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var ParentTransaction
     * Information about the parent transaction.
     */
    public $parent_transaction;

    /** @var string */
    public $invoice_id;

    /** @var string */
    public $custom_id;

    /**
     * @var SellerProtection
     * The level of protection offered as defined by [PayPal Seller Protection for
     * Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
     */
    public $seller_protection;

    /** @var boolean */
    public $final_capture;

    /**
     * @var SellerReceivableBreakdown
     * The detailed breakdown of the capture activity.
     */
    public $seller_receivable_breakdown;

    /**
     * @var string
     * The funds that are held on behalf of the merchant.
     *
     * use one of constants defined in this class to set the value:
     * @see DISBURSEMENT_MODE_INSTANT
     * @see DISBURSEMENT_MODE_DELAYED
     */
    public $disbursement_mode;

    /**
     * @var Error
     * The error details.
     */
    public $error;

    /** @var array<array> */
    public $links;

    /**
     * @var ProcessorResponse
     * The processor information. Might be required for payment requests, such as direct credit card transactions.
     */
    public $processor_response;

    /**
     * @var SupplementaryData
     * The supplementary data.
     */
    public $supplementary_data;

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
