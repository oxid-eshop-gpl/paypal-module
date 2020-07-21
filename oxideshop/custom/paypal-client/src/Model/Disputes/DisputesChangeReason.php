<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The change reason response.
 */
class DisputesChangeReason implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $links;
}
