<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The transaction hold information.
 */
class ExtensionsTransactionHoldInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $hold_required;

    /** @var string */
    public $id;

    /** @var string */
    public $reason;
}
