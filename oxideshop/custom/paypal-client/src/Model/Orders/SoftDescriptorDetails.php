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

    /** @var string */
    public $soft_descriptor;

    /** @var string */
    public $contact_type;

    /** @var string */
    public $contact_value;
}
