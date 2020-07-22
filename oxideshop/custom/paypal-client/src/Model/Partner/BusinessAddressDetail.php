<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A simple postal address with coarse-grained fields.
 *
 * generated from: customer_common_overrides-business_address_detail.json
 */
class BusinessAddressDetail extends AddressPortable implements JsonSerializable
{
    use BaseModel;

    /** The address of the business. */
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
