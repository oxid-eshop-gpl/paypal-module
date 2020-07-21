<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subsequent action.
 */
class SubsequentAction implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $links;
}
