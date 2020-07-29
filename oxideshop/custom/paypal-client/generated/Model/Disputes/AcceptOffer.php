<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A customer request to accept the offer made by the merchant.
 *
 * generated from: request-accept_offer.json
 */
class AcceptOffer implements JsonSerializable
{
    use BaseModel;

    /**
     * The customer notes about accepting of offer. PayPal can but the merchant cannot view these notes.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in AcceptOffer must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            2000,
            "note in AcceptOffer must have maxlength of 2000 $within"
        );
    }

    public function __construct()
    {
    }
}
