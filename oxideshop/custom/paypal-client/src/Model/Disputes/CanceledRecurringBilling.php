<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The recurring billing canceled details.
 */
class CanceledRecurringBilling implements \JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $expected_refund;

    /** @var CancellationDetails */
    public $cancellation_details;
}
