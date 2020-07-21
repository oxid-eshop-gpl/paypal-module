<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tracking information item.
 */
class TrackingInfoItem implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $carrier_name;

    /** @var string */
    public $tracking_url;

    /** @var string */
    public $tracking_number;

    /** @var string */
    public $tracking_status;

    /** @var string */
    public $note;

    /** @var string */
    public $posted_time;
}
