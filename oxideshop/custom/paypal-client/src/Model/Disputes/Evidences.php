<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant or customer request to provide evidence for a dispute.
 */
class Evidences implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $evidences;

    /** @var AddressPortable */
    public $return_shipping_address;
}
