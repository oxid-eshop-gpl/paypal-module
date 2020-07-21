<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The incorrect transaction amount details.
 */
class IncorrectTransactionAmount implements \JsonSerializable
{
    use BaseModel;

    /** @var Money */
    public $correct_transaction_amount;

    /** @var string */
    public $correct_transaction_time;
}
