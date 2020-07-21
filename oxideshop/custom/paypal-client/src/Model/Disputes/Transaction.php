<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The transaction for which to create a case.
 */
class Transaction implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var array */
    public $items;

    /** @var string */
    public $status;

    /** @var Money */
    public $gross_amount;

    /** @var string */
    public $create_time;
}
