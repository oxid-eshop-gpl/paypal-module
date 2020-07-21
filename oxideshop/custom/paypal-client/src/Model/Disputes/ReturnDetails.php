<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The return details for the product.
 */
class ReturnDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $return_time;

    /** @var string */
    public $mode;

    /** @var boolean */
    public $receipt;

    /** @var string */
    public $return_confirmation_number;

    /** @var boolean */
    public $returned;
}
