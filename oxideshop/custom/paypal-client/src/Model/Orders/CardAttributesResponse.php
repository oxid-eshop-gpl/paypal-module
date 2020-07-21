<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional attributes associated with the use of this card.
 */
class CardAttributesResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var VaultResponse
     * The details about a saved payment source.
     */
    public $vault;
}
