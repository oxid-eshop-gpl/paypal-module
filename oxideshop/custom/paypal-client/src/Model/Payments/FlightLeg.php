<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

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
	public $departure_date;

	/** @var string */
	public $departure_time;

	/** @var string */
	public $departure_airport;

	/** @var string */
	public $arrival_airport;

	/** @var string */
	public $stopover_code;

	/** @var string */
	public $fare_basis_code;

	/** @var string */
	public $arrival_time;

	/** @var string */
	public $conjunction_ticket_number;

	/** @var Money */
	public $fare;

	/** @var Money */
	public $tax;

	/** @var Money */
	public $fee;

	/** @var string */
	public $additional_notations;
}
