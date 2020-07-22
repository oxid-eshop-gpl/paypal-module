<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
        assert(!isset($this->issue_type) || strlen($this->issue_type) >= 1);
        assert(!isset($this->issue_type) || strlen($this->issue_type) <= 255);
        assert(isset($this->expected_refund));
    }
}
