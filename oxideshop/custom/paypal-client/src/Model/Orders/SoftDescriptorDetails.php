<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Soft Descriptor Details.
 *
 * generated from: model-soft_descriptor_details.json
 */
class SoftDescriptorDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Soft Descriptor.
     *
     * minLength: 1
     * maxLength: 30
     */
    public $soft_descriptor;

    /**
     * @var string
     * Contact type allows the merchant to specify the type of the additional information passing in the soft
     * descriptor Eg : CITY/URL/PHONE.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $contact_type;

    /**
     * @var string
     * Contact value allows the merchant to provide the business location, business phone number or URL to the
     * instrument holder.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $contact_value;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->soft_descriptor) || Assert::minLength($this->soft_descriptor, 1, "soft_descriptor in SoftDescriptorDetails must have minlength of 1 $within");
        !isset($this->soft_descriptor) || Assert::maxLength($this->soft_descriptor, 30, "soft_descriptor in SoftDescriptorDetails must have maxlength of 30 $within");
        !isset($this->contact_type) || Assert::minLength($this->contact_type, 1, "contact_type in SoftDescriptorDetails must have minlength of 1 $within");
        !isset($this->contact_type) || Assert::maxLength($this->contact_type, 127, "contact_type in SoftDescriptorDetails must have maxlength of 127 $within");
        !isset($this->contact_value) || Assert::minLength($this->contact_value, 1, "contact_value in SoftDescriptorDetails must have minlength of 1 $within");
        !isset($this->contact_value) || Assert::maxLength($this->contact_value, 255, "contact_value in SoftDescriptorDetails must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
