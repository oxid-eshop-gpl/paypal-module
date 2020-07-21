<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The contact details that a merchant provides to the customer to use to share their evidence documents.
 */
class CommunicationDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $email;

    /** @var string */
    public $note;

    /** @var string */
    public $time_posted;
}
