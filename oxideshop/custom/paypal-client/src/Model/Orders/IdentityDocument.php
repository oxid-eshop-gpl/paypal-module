<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The identity document.
 */
class IdentityDocument implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;

    /** @var DocumentIssuer */
    public $issuer;

    /** @var string */
    public $id_number;

    /** @var string */
    public $issued_date;

    /** @var string */
    public $expiration_date;
}
