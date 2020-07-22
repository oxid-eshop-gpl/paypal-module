<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The date and time of the last known transaction or when other entity-related information was updated, in
 * [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
 *
 * generated from: response-activity_entity_info.json
 */
class ActivityEntityInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $last_known_valid_transaction_date;

    /** @var boolean */
    public $card_replacement_address_confirmed;

    /** @var boolean */
    public $card_shared_with_someone_else;

    /** @var boolean */
    public $merchant_has_card_details;

    /** @var boolean */
    public $card_settings_changed;
}
