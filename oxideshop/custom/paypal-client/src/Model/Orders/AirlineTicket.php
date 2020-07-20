<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details for the airline ticket.
 */
class AirlineTicket
{
	public $number;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $issue_date;
	public $issuing_carrier_code;
	public $travel_agency_name;
	public $travel_agency_code;
	public $restricted_ticket;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fare;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $tax;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fee;
}
