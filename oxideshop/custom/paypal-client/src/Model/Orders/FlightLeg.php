<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

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

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $departure_date;

	/** @var OxidProfessionalServices\PayPal\Api\Model\TimeHourmin */
	public $departure_time;

	/** @var string */
	public $departure_airport;

	/** @var string */
	public $arrival_airport;

	/** @var string */
	public $stopover_code;

	/** @var string */
	public $fare_basis_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\TimeHourmin */
	public $arrival_time;

	/** @var string */
	public $conjunction_ticket_number;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fare;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $tax;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fee;

	/** @var string */
	public $additional_notations;
}
