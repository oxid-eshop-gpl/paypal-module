<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
        assert(!isset($this->soft_descriptor) || strlen($this->soft_descriptor) >= 1);
        assert(!isset($this->soft_descriptor) || strlen($this->soft_descriptor) <= 30);
        assert(!isset($this->contact_type) || strlen($this->contact_type) >= 1);
        assert(!isset($this->contact_type) || strlen($this->contact_type) <= 127);
        assert(!isset($this->contact_value) || strlen($this->contact_value) >= 1);
        assert(!isset($this->contact_value) || strlen($this->contact_value) <= 255);
    }
}
