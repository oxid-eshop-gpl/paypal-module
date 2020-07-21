<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Business identification details.
 */
class BusinessIdentification implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;

    /** @var string */
    public $identifier;

    /** @var DocumentIssuer */
    public $issuer;

    /** @var string */
    public $issued_time;
}
