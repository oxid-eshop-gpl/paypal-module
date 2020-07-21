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

    /** @var Money */
    public $expected_refund;

    /** @var CancellationDetails */
    public $cancellation_details;

    /** @var ProductDetails */
    public $product_details;

    /** @var ServiceDetails */
    public $service_details;
}
