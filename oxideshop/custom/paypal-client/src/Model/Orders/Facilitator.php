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

    /** A party who sets up the context and eventually owns or controls the payment. */
    const TYPE_API_CALLER = 'API_CALLER';

    /** A checkout participant involved in the transaction who is setup as a partner. */
    const TYPE_PARTNER = 'PARTNER';

    /** Internal applications or actors. */
    const TYPE_INTERNAL = 'INTERNAL';

    /**
     * @var string
     * Facilitator type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_API_CALLER
     * @see TYPE_PARTNER
     * @see TYPE_INTERNAL
     */
    public $type;

    /** @var string */
    public $client_id;

    /** @var string */
    public $integration_identifier;

    /** @var array */
    public $segments;
}
