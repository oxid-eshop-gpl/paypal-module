<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Soft Descriptor Details.
 */
class SoftDescriptorDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $soft_descriptor;

    /** @var string */
    public $contact_type;

    /** @var string */
    public $contact_value;
}
