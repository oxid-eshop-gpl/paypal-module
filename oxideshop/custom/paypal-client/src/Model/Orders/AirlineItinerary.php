<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The airline itinerary details.
 */
class AirlineItinerary implements \JsonSerializable
{
    /** @var AirlineTicket */
    public $ticket;

    /** @var AirlinePassenger */
    public $passenger;

    /** @var array */
    public $flight_leg_details;

    /** @var integer */
    public $clearing_sequence;

    /** @var integer */
    public $clearing_count;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
