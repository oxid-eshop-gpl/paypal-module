<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The airline itinerary details.
 */
class AirlineItinerary implements JsonSerializable
{
    use BaseModel;

    /** @var AirlineTicket */
    public $ticket;

    /** @var AirlinePassenger */
    public $passenger;

    /** @var array<FlightLeg> */
    public $flight_leg_details;

    /** @var integer */
    public $clearing_sequence;

    /** @var integer */
    public $clearing_count;
}
