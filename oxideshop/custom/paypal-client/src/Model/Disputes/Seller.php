<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the merchant who receives the funds and fulfills the order. For example, merchant ID, and
 * contact email address.
 */
class Seller implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $email;

    /** @var string */
    public $merchant_id;

    /** @var string */
    public $name;
}
