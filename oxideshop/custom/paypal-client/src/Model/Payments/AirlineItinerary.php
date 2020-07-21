<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The airline itinerary details.
 */
class AirlineItinerary
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
}
