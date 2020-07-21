<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The date and time of the last known transaction or when other entity-related information was updated, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
 */
class ActivityEntityInfo implements \JsonSerializable
{
    /** @var string */
    public $last_known_valid_transaction_date;

    /** @var boolean */
    public $card_replacement_address_confirmed;

    /** @var boolean */
    public $card_shared_with_someone_else;

    /** @var boolean */
    public $merchant_has_card_details;

    /** @var boolean */
    public $card_settings_changed;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
