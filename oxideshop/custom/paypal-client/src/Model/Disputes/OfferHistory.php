<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The offer history.
 */
class OfferHistory implements \JsonSerializable
{
    /** @var string */
    public $offer_time;

    /** @var string */
    public $actor;

    /** @var string */
    public $event_type;

    /** @var string */
    public $offer_type;

    /** @var Money */
    public $offer_amount;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
