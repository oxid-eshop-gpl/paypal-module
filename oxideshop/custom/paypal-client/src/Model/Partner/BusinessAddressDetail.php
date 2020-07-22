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
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    /**
     * @var boolean
     * Whether this is the primary address of the user. This cannot be directly set to `false`, but rather it is
     * toggled `false` in the datastore when another address is set to primary.
     */
    public $primary;

    /**
     * @var boolean
     * Whether this address has been inactivated.
     */
    public $inactive;

    public function validate()
    {
        assert(!isset($this->type) || strlen($this->type) >= 1);
        assert(!isset($this->type) || strlen($this->type) <= 255);
    }
}
