<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The credit not processed details.
 *
 * generated from: response-credit_not_processed.json
 */
class CreditNotProcessed implements JsonSerializable
{
    use BaseModel;

    /** The product has an issue. */
    const ISSUE_TYPE_PRODUCT = 'PRODUCT';

    /** The service has an issue. */
    const ISSUE_TYPE_SERVICE = 'SERVICE';

    /**
     * @var string
     * The issue type.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUE_TYPE_PRODUCT
     * @see ISSUE_TYPE_SERVICE
     * minLength: 1
     * maxLength: 255
     */
    public $issue_type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $expected_refund;

    /**
     * @var CancellationDetails
     * The cancellation details.
     */
    public $cancellation_details;

    /**
     * @var ProductDetails
     * The product information.
     */
    public $product_details;

    /**
     * @var ServiceDetails
     * The service details.
     */
    public $service_details;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->issue_type) || Assert::minLength($this->issue_type, 1, "issue_type in CreditNotProcessed must have minlength of 1 $within");
        !isset($this->issue_type) || Assert::maxLength($this->issue_type, 255, "issue_type in CreditNotProcessed must have maxlength of 255 $within");
        !isset($this->expected_refund) || Assert::notNull($this->expected_refund->currency_code, "currency_code in expected_refund must not be NULL within CreditNotProcessed $within");
        !isset($this->expected_refund) || Assert::notNull($this->expected_refund->value, "value in expected_refund must not be NULL within CreditNotProcessed $within");
        !isset($this->expected_refund) || Assert::isInstanceOf($this->expected_refund, Money::class, "expected_refund in CreditNotProcessed must be instance of Money $within");
        !isset($this->expected_refund) || $this->expected_refund->validate(CreditNotProcessed::class);
        !isset($this->cancellation_details) || Assert::isInstanceOf($this->cancellation_details, CancellationDetails::class, "cancellation_details in CreditNotProcessed must be instance of CancellationDetails $within");
        !isset($this->cancellation_details) || $this->cancellation_details->validate(CreditNotProcessed::class);
        !isset($this->product_details) || Assert::isInstanceOf($this->product_details, ProductDetails::class, "product_details in CreditNotProcessed must be instance of ProductDetails $within");
        !isset($this->product_details) || $this->product_details->validate(CreditNotProcessed::class);
        !isset($this->service_details) || Assert::isInstanceOf($this->service_details, ServiceDetails::class, "service_details in CreditNotProcessed must be instance of ServiceDetails $within");
        !isset($this->service_details) || $this->service_details->validate(CreditNotProcessed::class);
    }

    public function __construct()
    {
    }
}
