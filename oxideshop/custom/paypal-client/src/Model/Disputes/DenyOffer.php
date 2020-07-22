<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A customer request to deny the offer made by the merchant.
 *
 * generated from: request-deny_offer.json
 */
class DenyOffer implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The customer notes about the denial of offer. PayPal can but the merchant cannot view these notes.
     */
    public $note;
}