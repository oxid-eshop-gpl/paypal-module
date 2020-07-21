<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund details.
 */
class Refund implements JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $gross_amount;

    /** @var string */
    public $transaction_time;

    /** @var string */
    public $transaction_id;

    /** @var string */
    public $invoice_number;
}
