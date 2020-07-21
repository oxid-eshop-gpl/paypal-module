<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
 */
class AmountWithBreakdown implements JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $gross_amount;

    /** @var Money */
    public $fee_amount;

    /** @var Money */
    public $shipping_amount;

    /** @var Money */
    public $tax_amount;

    /** @var Money */
    public $net_amount;
}
