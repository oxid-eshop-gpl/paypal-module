<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     * this is mandatory to be set
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
        Assert::notNull($this->type, "type in BusinessAddressDetail must not be NULL $within");
         Assert::minLength($this->type, 1, "type in BusinessAddressDetail must have minlength of 1 $within");
         Assert::maxLength($this->type, 255, "type in BusinessAddressDetail must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
