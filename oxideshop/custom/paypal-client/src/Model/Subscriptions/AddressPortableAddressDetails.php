<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The non-portable additional address details that are sometimes needed for compliance, risk, or other scenarios
 * where fine-grain address information might be needed. Not portable with common third party and open source.
 * Redundant with core fields.<br/>For example, `address_portable.address_line_1` is usually a combination of
 * `address_details.street_number`, `street_name`, and `street_type`.
 */
class AddressPortableAddressDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $street_number;

    /** @var string */
    public $street_name;

    /** @var string */
    public $street_type;

    /** @var string */
    public $delivery_service;

    /** @var string */
    public $building_name;

    /** @var string */
    public $sub_building;
}
