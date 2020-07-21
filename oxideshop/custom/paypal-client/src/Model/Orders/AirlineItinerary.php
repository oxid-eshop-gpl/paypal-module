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

	/** @var array */
	public $flight_leg_details;

	/** @var integer */
	public $clearing_sequence;

	/** @var integer */
	public $clearing_count;
}
