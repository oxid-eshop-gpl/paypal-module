<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The airline itinerary details.
 */
class AirlineItinerary
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\AirlineTicket */
	public $ticket;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AirlinePassenger */
	public $passenger;
	public $flight_leg_details;
	public $clearing_sequence;
	public $clearing_count;
}
