<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the customer who funds the payment. For example, the customer's first name, last name, and
 * email address.
 */
class Buyer implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $email;

    /** @var string */
    public $payer_id;

    /** @var string */
    public $name;
}
