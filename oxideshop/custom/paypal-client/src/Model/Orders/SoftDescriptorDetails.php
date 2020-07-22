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
}
