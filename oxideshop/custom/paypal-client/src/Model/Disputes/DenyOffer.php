<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A customer request to deny the offer made by the merchant.
 */
class DenyOffer implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $note;
}
