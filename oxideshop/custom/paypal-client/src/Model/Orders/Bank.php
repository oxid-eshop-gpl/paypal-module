<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The bank source used to fund the payment
 */
class Bank implements JsonSerializable
{
    use BaseModel;

    /** @var AchDebit */
    public $ach_debit;
}
