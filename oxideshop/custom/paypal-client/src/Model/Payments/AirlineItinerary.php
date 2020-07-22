<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The airline itinerary details.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-airline_itinerary.json
 */
class AirlineItinerary implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AirlineTicket
     * The details for the airline ticket.
     */
    public $ticket;

    /**
     * @var AirlinePassenger
     * The airline passenger details.
     */
    public $passenger;

    /** @var array<FlightLeg> */
    public $flight_leg_details;

    /** @var integer */
    public $clearing_sequence;

    /** @var integer */
    public $clearing_count;
}
