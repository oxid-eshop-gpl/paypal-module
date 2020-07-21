<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Facilitator involved in the Payment. Usually the API caller. Example: AliExpress, facebook, eBay.
 */
class Facilitator extends Participant implements JsonSerializable
{
    use BaseModel;

    const TYPE_API_CALLER = 'API_CALLER';
    const TYPE_PARTNER = 'PARTNER';
    const TYPE_INTERNAL = 'INTERNAL';

    /**
     * @var string
     * Facilitator type.
     */
    public $type;

    /** @var string */
    public $client_id;

    /** @var string */
    public $integration_identifier;

    /** @var array */
    public $segments;
}
