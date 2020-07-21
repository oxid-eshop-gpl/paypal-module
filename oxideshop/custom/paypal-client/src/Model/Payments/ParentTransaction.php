<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information about the parent transaction.
 */
class ParentTransaction implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $type;
}
