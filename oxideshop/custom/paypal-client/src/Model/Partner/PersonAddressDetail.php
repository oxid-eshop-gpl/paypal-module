<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A simple postal address with coarse-grained fields.
 *
 * generated from: customer_common_overrides-person_address_detail.json
 */
class PersonAddressDetail extends AddressPortable implements JsonSerializable
{
    use BaseModel;

    /** The home address of the customer. */
    const TYPE_HOME = 'HOME';

    /**
     * @var string
     * The address type under which the provided address is tagged.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_HOME
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength($this->type, 1, "type in PersonAddressDetail must have minlength of 1 $within");
        !isset($this->type) || Assert::maxLength($this->type, 255, "type in PersonAddressDetail must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
