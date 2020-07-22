<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A captured payment.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-capture.json
 */
class Capture extends CaptureStatus implements JsonSerializable
{
    use BaseModel;

    /** The funds are released to the merchant immediately. */
    const DISBURSEMENT_MODE_INSTANT = 'INSTANT';

    /** The funds are held for a finite number of days. The actual duration depends on the region and type of integration. You can release the funds through a referenced payout. Otherwise, the funds disbursed automatically after the specified duration. */
    const DISBURSEMENT_MODE_DELAYED = 'DELAYED';

    /**
     * @var string
     * The PayPal-generated ID for the captured payment.
     */
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

    /**
     * @var string
     * The API caller-provided external invoice number for this order. Appears in both the payer's transaction
     * history and the emails that the payer receives.
     */
    public $invoice_id;

    /**
     * @var string
     * The API caller-provided external ID. Used to reconcile API caller-initiated transactions with PayPal
     * transactions. Appears in transaction and settlement reports.
     *
     * maxLength: 127
     */
    public $custom_id;

    /**
     * @var SellerProtection
     * The level of protection offered as defined by [PayPal Seller Protection for
     * Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
     */
    public $seller_protection;

    /**
     * @var boolean
     * Indicates whether you can make additional captures against the authorized payment. Set to `true` if you do not
     * intend to capture additional payments against the authorization. Set to `false` if you intend to capture
     * additional payments against the authorization.
     */
    public $final_capture = false;

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
    public $disbursement_mode = 'INSTANT';

    /**
     * @var Error
     * The error details.
     */
    public $error;

    /**
     * @var array<array>
     * An array of related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
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
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in Capture must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(Capture::class);
        !isset($this->parent_transaction) || Assert::isInstanceOf($this->parent_transaction, ParentTransaction::class, "parent_transaction in Capture must be instance of ParentTransaction $within");
        !isset($this->parent_transaction) || $this->parent_transaction->validate(Capture::class);
        !isset($this->custom_id) || Assert::maxLength($this->custom_id, 127, "custom_id in Capture must have maxlength of 127 $within");
        !isset($this->seller_protection) || Assert::isInstanceOf($this->seller_protection, SellerProtection::class, "seller_protection in Capture must be instance of SellerProtection $within");
        !isset($this->seller_protection) || $this->seller_protection->validate(Capture::class);
        !isset($this->seller_receivable_breakdown) || Assert::isInstanceOf($this->seller_receivable_breakdown, SellerReceivableBreakdown::class, "seller_receivable_breakdown in Capture must be instance of SellerReceivableBreakdown $within");
        !isset($this->seller_receivable_breakdown) || $this->seller_receivable_breakdown->validate(Capture::class);
        !isset($this->error) || Assert::isInstanceOf($this->error, Error::class, "error in Capture must be instance of Error $within");
        !isset($this->error) || $this->error->validate(Capture::class);
        !isset($this->links) || Assert::isArray($this->links, "links in Capture must be array $within");
        !isset($this->processor_response) || Assert::isInstanceOf($this->processor_response, ProcessorResponse::class, "processor_response in Capture must be instance of ProcessorResponse $within");
        !isset($this->processor_response) || $this->processor_response->validate(Capture::class);
        !isset($this->supplementary_data) || Assert::isInstanceOf($this->supplementary_data, SupplementaryData::class, "supplementary_data in Capture must be instance of SupplementaryData $within");
        !isset($this->supplementary_data) || $this->supplementary_data->validate(Capture::class);
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in Capture must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in Capture must have maxlength of 64 $within");
        !isset($this->update_time) || Assert::minLength($this->update_time, 20, "update_time in Capture must have minlength of 20 $within");
        !isset($this->update_time) || Assert::maxLength($this->update_time, 64, "update_time in Capture must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
