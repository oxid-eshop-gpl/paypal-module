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
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    public function validate()
    {
        assert(!isset($this->note) || strlen($this->note) >= 1);
        assert(!isset($this->note) || strlen($this->note) <= 2000);
    }
}
