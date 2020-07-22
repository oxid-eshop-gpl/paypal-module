<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The non-portable additional address details that are sometimes needed for compliance, risk, or other scenarios
 * where fine-grain address information might be needed. Not portable with common third party and opensource.
 * Redundant with core fields. For example, `address_portable.address_line_1` is usually a combination of
 * `address_details.street_number` and `street_name` and `street_type`.
 *
 * generated from: AddressPortable_address_details
 */
class AddressPortableAddressDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The street number.
     *
     * maxLength: 300
     */
    public $street_number;

    /**
     * @var string
     * The street name. Just `Drury` in `Drury Lane`.
     *
     * maxLength: 300
     */
    public $street_name;

    /**
     * @var string
     * The street type. For example, avenue, boulevard, road, or expressway.
     *
     * maxLength: 300
     */
    public $street_type;

    /**
     * @var string
     * The delivery service. Post office box, bag number, or post office name.
     *
     * maxLength: 300
     */
    public $delivery_service;

    /**
     * @var string
     * A named locations that represents the premise. Usually a building name or number or collection of buildings
     * with a common name or number. For example, <code>Craven House</code>.
     *
     * maxLength: 300
     */
    public $building_name;

    /**
     * @var string
     * The first-order entity below a named building or location that represents the sub-premise. Usually a single
     * building within a collection of buildings with a common name. Can be a flat, story, floor, room, or apartment.
     *
     * maxLength: 300
     */
    public $sub_building;

    public function validate()
    {
        assert(!isset($this->street_number) || strlen($this->street_number) <= 300);
        assert(!isset($this->street_name) || strlen($this->street_name) <= 300);
        assert(!isset($this->street_type) || strlen($this->street_type) <= 300);
        assert(!isset($this->delivery_service) || strlen($this->delivery_service) <= 300);
        assert(!isset($this->building_name) || strlen($this->building_name) <= 300);
        assert(!isset($this->sub_building) || strlen($this->sub_building) <= 300);
    }
}
