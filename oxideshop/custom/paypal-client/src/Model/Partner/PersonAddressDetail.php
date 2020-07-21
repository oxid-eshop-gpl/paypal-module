<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A simple postal address with coarse-grained fields.
 */
class PersonAddressDetail extends AddressPortable implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $type;

    /** @var boolean */
    public $primary;

    /** @var boolean */
    public $inactive;
}
