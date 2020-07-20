<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details of the flight leg.
 */
class FlightLeg
{
	public $flight_code;
	public $flight_number;
	public $carrier_code;
	public $service_class;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $departure_date;

	/** @var OxidProfessionalServices\PayPal\Api\Model\TimeHourmin */
	public $departure_time;
	public $departure_airport;
	public $arrival_airport;
	public $stopover_code;
	public $fare_basis_code;

	/** @var OxidProfessionalServices\PayPal\Api\Model\TimeHourmin */
	public $arrival_time;
	public $conjunction_ticket_number;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fare;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $tax;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fee;
	public $additional_notations;
}
