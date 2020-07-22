<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The authorized payment transaction.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-authorization.json
 */
class Authorization extends AuthorizationStatus implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The PayPal-generated ID for the authorized payment.
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
     * The API caller-provided external ID. Used to reconcile API caller-initiated transactions with PayPal
     * transactions. Appears in transaction and settlement reports.
     *
     * maxLength: 127
     */
    public $custom_id;

    /**
     * @var string
     * The PayPal-generated alternate ID for the authorized payment. For example, used for UATP airline integration.
     *
     * minLength: 1
     * maxLength: 22
     */
    public $alternate_id;

    /**
     * @var SellerProtection
     * The level of protection offered as defined by [PayPal Seller Protection for
     * Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
     */
    public $seller_protection;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $expiration_time;

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
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within Authorization $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within Authorization $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in Authorization must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(Authorization::class);
        !isset($this->custom_id) || Assert::maxLength($this->custom_id, 127, "custom_id in Authorization must have maxlength of 127 $within");
        !isset($this->alternate_id) || Assert::minLength($this->alternate_id, 1, "alternate_id in Authorization must have minlength of 1 $within");
        !isset($this->alternate_id) || Assert::maxLength($this->alternate_id, 22, "alternate_id in Authorization must have maxlength of 22 $within");
        !isset($this->seller_protection) || Assert::isInstanceOf($this->seller_protection, SellerProtection::class, "seller_protection in Authorization must be instance of SellerProtection $within");
        !isset($this->seller_protection) || $this->seller_protection->validate(Authorization::class);
        !isset($this->expiration_time) || Assert::minLength($this->expiration_time, 20, "expiration_time in Authorization must have minlength of 20 $within");
        !isset($this->expiration_time) || Assert::maxLength($this->expiration_time, 64, "expiration_time in Authorization must have maxlength of 64 $within");
        !isset($this->links) || Assert::isArray($this->links, "links in Authorization must be array $within");
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in Authorization must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in Authorization must have maxlength of 64 $within");
        !isset($this->update_time) || Assert::minLength($this->update_time, 20, "update_time in Authorization must have minlength of 20 $within");
        !isset($this->update_time) || Assert::maxLength($this->update_time, 64, "update_time in Authorization must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
