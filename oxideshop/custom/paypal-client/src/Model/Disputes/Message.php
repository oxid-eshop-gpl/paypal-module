<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A customer- or merchant-posted message for the dispute.
 */
class Message implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $posted_by;

    /** @var string */
    public $time_posted;

    /** @var string */
    public $content;
}
