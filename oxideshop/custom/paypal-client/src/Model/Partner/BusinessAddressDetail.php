<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A simple postal address with coarse-grained fields.
 */
class BusinessAddressDetail extends AddressPortable implements JsonSerializable
{
    use BaseModel;

    const TYPE_WORK = 'WORK';

    /**
     * @var string
     * Address type under which the provided address is tagged
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_WORK
     */
    public $type;

    /** @var boolean */
    public $primary;

    /** @var boolean */
    public $inactive;
}
