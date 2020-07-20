<?php

namespace OxidProfessionalServices\PayPal\Api\Payments;

/**
 * The details of the flight leg.
 */
class FlightLeg
{
	/** @var string */
	public $flight_code;

	/** @var integer */
	public $flight_number;

	/** @var string */
	public $carrier_code;

	/** @var string */
	public $service_class;

	/** @var string */
	public $departure_airport;

	/** @var string */
	public $arrival_airport;

	/** @var string */
	public $stopover_code;

	/** @var string */
	public $fare_basis_code;

	/** @var string */
	public $conjunction_ticket_number;

	/** @var string */
	public $additional_notations;
}
