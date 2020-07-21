<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The credit not processed details.
 */
class CreditNotProcessed implements JsonSerializable
{
    use BaseModel;

    /** @var string */
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
}
