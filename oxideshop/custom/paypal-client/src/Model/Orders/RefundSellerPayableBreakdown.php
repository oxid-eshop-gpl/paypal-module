<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The breakdown of the refund.
 */
class RefundSellerPayableBreakdown implements \JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $gross_amount;

    /** @var Money */
    public $paypal_fee;

    /** @var Money */
    public $net_amount;

    /** @var array */
    public $platform_fees;

    /** @var array */
    public $net_amount_breakdown;

    /** @var Money */
    public $total_refunded_amount;
}
