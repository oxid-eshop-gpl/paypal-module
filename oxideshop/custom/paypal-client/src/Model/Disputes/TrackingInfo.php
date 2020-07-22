<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tracking information.
 *
 * generated from: response-tracking_info.json
 */
class TrackingInfo implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $carrier_name;

    /** @var string */
    public $carrier_name_other;

    /** @var string */
    public $tracking_url;

    /** @var string */
    public $tracking_number;
}
