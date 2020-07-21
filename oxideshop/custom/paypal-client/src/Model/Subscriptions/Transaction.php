<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The transaction details.
 */
class Transaction extends CaptureStatus implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var AmountWithBreakdown */
    public $amount_with_breakdown;

    /** @var Name */
    public $payer_name;

    /** @var string */
    public $payer_email;

    /** @var string */
    public $time;
}
