<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A customer request to accept the offer made by the merchant.
 *
 * generated from: request-accept_offer.json
 */
class AcceptOffer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The customer notes about accepting of offer. PayPal can but the merchant cannot view these notes.
     */
    public $note;
}
