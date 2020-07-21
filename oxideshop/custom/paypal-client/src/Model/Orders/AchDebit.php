<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * ACH bank details required to fund the payment.
 */
class AchDebit implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $account_number;

    /** @var string */
    public $routing_number;

    /** @var string */
    public $account_type;

    /** @var string */
    public $account_holder_name;
}
