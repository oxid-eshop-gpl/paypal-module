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

    /**
     * @var boolean
     * Indicates whether the customer agreed to send the replaced card to the address associated to card.
     */
    public $card_replacement_address_confirmed;

    /**
     * @var boolean
     * Indicates whether the customer shared their card with someone else.
     */
    public $card_shared_with_someone_else;

    /**
     * @var boolean
     * Indicates whether the merchant has the customer's card details.
     */
    public $merchant_has_card_details;

    /**
     * @var boolean
     * Indicates whether the customer has changed their card settings.
     */
    public $card_settings_changed;
}
