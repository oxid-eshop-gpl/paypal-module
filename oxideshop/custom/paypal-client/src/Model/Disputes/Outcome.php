<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The outcome of the dispute case.
 */
class Outcome implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $faulty_party;

    /** @var string */
    public $adjudication_reason;

    /** @var string */
    public $resolution_date;
}
