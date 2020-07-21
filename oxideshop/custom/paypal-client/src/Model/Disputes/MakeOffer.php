<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant request to make an offer to resolve a dispute.
 */
class MakeOffer implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $note;

    /** @var Money */
    public $offer_amount;

    /** @var AddressPortable */
    public $return_shipping_address;

    /** @var string */
    public $invoice_id;

    /** @var string */
    public $offer_type;
}
